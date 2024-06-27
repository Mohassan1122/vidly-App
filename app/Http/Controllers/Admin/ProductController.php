<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function products()
    {
        Session::put('page', 'products');
        $products = Product::with(['section' => function ($query) {
            $query->select('id', 'name');
        }, 'category' => function ($query) {
            $query->select('id', 'category_name');
        }])->get()->toArray();
        //dd($products);
        return view('superadmin.products.products')->with(compact('products'));
    }
    public function updateProductStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            Product::where('id', $data['product_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'product_id' => $data['product_id']]);
        }
    }
    public function deleteProducts($id)
    {
        Product::where('id', $id)->delete();
        $message = "Products Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }
    public function addEditProduct(Request $request, $id = null)
    {
        Session::put('page', 'products');

        if ($id == "") {
            $title = "Add Product";
            $product = new Product;
            $message = "Product added Successfully";
        } else {
            $title = "Edit Product";
            $product = Product::find($id);
            $message = "product Updated Successfully";
        }

        // Add Functionality
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();

            $request->validate([
                'category_id' => 'required',
                'product_name' => 'required',
                'product_code' => 'required|regex:/^\w+$/',
                'product_price' => 'required|numeric',
                'product_color' => 'required|regex:/^[\pL\s\-]+$/u',
            ]);

            // Upload product Image
            if ($request->hasFile('product_image')) {
                $image_tmp = $request->file('product_image');
                if ($image_tmp->isValid()) {
                    $extension = $image_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $largeImagePath = 'frontend/images/productImages/large/' . $imageName;
                    $mediumImagePath = 'frontend/images/productImages/medium/' . $imageName;
                    $smallImagePath = 'frontend/images/productImages/small/' . $imageName;
                    //upload->  Small sizes: 300x300, Medium sizes: 500x500,Large sizes: 1000x1000
                    Image::make($image_tmp)->resize(300, 300)->save($smallImagePath);
                    Image::make($image_tmp)->resize(500, 500)->save($mediumImagePath);
                    Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);
                    //insert or update to database
                    $product->product_image = $imageName;
                }
            }
            //echo "<pre>"; print_r($request->file('product_video')); die();
            // Upload product Video
            if ($request->hasFile('product_video')) {
                $video_tmp = $request->file('product_video');

                if ($video_tmp->isValid()) {
                    $extension = $video_tmp->getClientOriginalExtension();
                    $videoName = rand(111, 99999) . '.' . $extension;
                    $videoPath = 'frontend/videos/productVideos/';
                    $video_tmp->move($videoPath, $videoName);
                    //insert or update to database
                    $product->product_video = $videoName;
                }
            }

            // Save Product Details In Product Table
            $categoryDetails = Category::find($data['category_id']);
            $product->section_id = $categoryDetails['section_id'];
            $product->category_id = $data['category_id'];
            $product->brand_id = $data['brand_id'];

            $superadminType = Auth::guard('superadmin')->user()->type;
            $superadmin_id = Auth::guard('superadmin')->user()->id;
            $admin_id = Auth::guard('superadmin')->user()->admin_id;

            $product->superadmin_type = $superadminType;
            $product->superadmin_id = $superadmin_id;
            if ($superadminType == "admin") {
                $product->admin_id = $admin_id;
            } else {
                $product->admin_id = 0;
            }

            if (!empty($data['user_id'])) {
                $product->user_id = $data['user_idd'];
            } else {
                $product->user_id = 0;
            }
            if (empty($data['product_discount'])) {
                $data['product_discount'] = 0;
            }
            if (empty($data['product_weight'])) {
                $data['product_weight'] = 0;
            }

            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->product_price = $data['product_price'];
            $product->product_discount = $data['product_discount'];
            $product->product_weight = $data['product_weight'];
            $product->description = $data['description'];
            $product->meta_title = $data['meta_title'];
            $product->meta_description = $data['meta_description'];
            $product->meta_keyword = $data['meta_keyword'];

            if (!empty($data['is_featured'])) {
                $product->is_feature = $data['is_featured'];
            } else {
                $product->is_feature = "No";
            }
            $product->status = 1;
            $product->save();
            return redirect('superadmin/products')->with('success_message', $message);
        }



        // ?getsection and categories

        $categories = Section::with('categories')->get()->toArray();
        //dd($categories);

        $brands = Brand::where('status', 1)->get()->toArray();
        //dd($brands);



        return view('superadmin.products.add_edit_products')->with(compact('title', 'product', 'categories', 'brands'));
    }

    // delete product images
    public function deleteProductImage($id)
    {
        $productImage = Product::select("product_image")->where('id', $id)->first();
        $largeImagePath = 'frontend/images/productImages/large/';
        $mediumImagePath = 'frontend/images/productImages/medium/';
        $smallImagePath = 'frontend/images/productImages/small/';
        if (file_exists($largeImagePath . $productImage->product_image)) {
            unlink($largeImagePath . $productImage->product_image);
        }
        if (file_exists($mediumImagePath . $productImage->product_image)) {
            unlink($mediumImagePath . $productImage->product_image);
        }
        if (file_exists($smallImagePath . $productImage->product_image)) {
            unlink($smallImagePath . $productImage->product_image);
        }
        Product::where('id', $id)->update(['product_image' => '']);
        $message = "Product Image Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }


    // delete product images
    public function deleteProductVideo($id)
    {
        $productVideo = Product::select("product_video")->where('id', $id)->first();
        $videoPath = 'frontend/videos/productVideos/';
        if (file_exists($videoPath . $productVideo->product_video)) {
            unlink($videoPath . $productVideo->product_video);
        }
        Product::where('id', $id)->update(['product_video' => '']);
        $message = "Product Video Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }

    public function addAttributes(Request $request, $id)
    {
        Session::put('page', 'products');
        $product = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')->with('attribute')->find($id);
        // dd($product);

        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            foreach ($data['sku'] as $key => $value) {
                if (!empty($value)) {

                    //Sku
                    $skuCount = ProductAttribute::where('sku', $value)->count();
                    if ($skuCount > 0) {
                        return redirect()->back()->with('error_message',  'Sku already Exist');
                    }

                    // Size duplicate
                    $sizeCount = ProductAttribute::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
                    if ($sizeCount > 0) {
                        return redirect()->back()->with('error_message',  'Size already Exist');
                    }


                    $attribute = new ProductAttribute;
                    $attribute->product_id = $id;
                    $attribute->sku = $value;
                    $attribute->size = $data['size'][$key];
                    $attribute->price = $data['price'][$key];
                    $attribute->stock = $data['stock'][$key];
                    $attribute->status = 1;
                    $attribute->save();
                }
            }

            return redirect()->back()->with('success_message',  'Product Attribute Added');
        }

        return view('superadmin.attributes.add_edit_attributes')->with(compact('product'));
    }


    public function updateAttributeStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            ProductAttribute::where('id', $data['attribute_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'attribute_id' => $data['attribute_id']]);
        }
    }
    public function addEditAttributes(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            foreach ($data['attribute_id'] as $key => $attribute) {
                if (!empty($attribute)) {
                    ProductAttribute::where(['id' => $data['attribute_id'][$key]])->update(['price' => $data['price'][$key], 'stock' => $data['stock'][$key]]);
                }
            }
            return redirect()->back()->with('success_message',  'Product Attribute Updated');
        }
    }
    public function addImages(Request $request, $id)
    {
        Session::put('page', 'products');

        $product = Product::select('id', 'product_name', 'product_code', 'product_color', 'product_price', 'product_image')->with('images')->find($id);

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Upload product Image
            if ($request->hasFile('images')) {
                $images = $request->file('images');
                //echo "<pre>"; print_r($image_tmp); die();
                foreach ($images as $key => $image) {
                    $image_tmp = Image::make($image);
                    $image_name = $image->getClientOriginalName();
                    $extension = $image->getClientOriginalExtension();
                    $imageName =  $image_name . rand(111, 99999) . '.' . $extension;
                        $largeImagePath = 'frontend/images/productImages/large/' . $imageName;
                        $mediumImagePath = 'frontend/images/productImages/medium/' . $imageName;
                        $smallImagePath = 'frontend/images/productImages/small/' . $imageName;

                    //     //upload->  Small sizes: 300x300, Medium sizes: 500x500,Large sizes: 1000x1000
                        Image::make($image_tmp)->resize(300, 300)->save($smallImagePath);
                        Image::make($image_tmp)->resize(500, 500)->save($mediumImagePath);
                        Image::make($image_tmp)->resize(1000, 1000)->save($largeImagePath);
                    //     //insert or update to database
                    $image = new ProductImage;
                         $image->image = $imageName;
                         $image->product_id = $id;
                         $image->status = 1;
                         $image->save();


                }
            }
            return redirect()->back()->with('success_message',  'Product Image Added');
        }

        return view('superadmin.images.add_images')->with(compact('product'));
    }

    public function updateImageStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            ProductImage::where('id', $data['image_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'image_id' => $data['image_id']]);
        }
    }

    public function deleteImage($id)
    {
        $productImage = ProductImage::select("image")->where('id', $id)->first();
        $largeImagePath = 'frontend/images/productImages/large/';
        $mediumImagePath = 'frontend/images/productImages/medium/';
        $smallImagePath = 'frontend/images/productImages/small/';
        if (file_exists($largeImagePath . $productImage->image)) {
            unlink($largeImagePath . $productImage->image);
        }
        if (file_exists($mediumImagePath . $productImage->image)) {
            unlink($mediumImagePath . $productImage->image);
        }
        if (file_exists($smallImagePath . $productImage->image)) {
            unlink($smallImagePath . $productImage->image);
        }
        ProductImage::where('id', $id)->delete();
        $message = "Product Image Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }
}

