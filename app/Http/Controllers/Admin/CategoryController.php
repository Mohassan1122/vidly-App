<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function categories()
    {
        Session::put('page', 'categories');
        $categories = Category::with(['section', 'parentCategory'])->get()->toArray();
        //dd($categories);
        return view('superadmin.category.category')->with(compact('categories'));
    }

    public function updateCategoryStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            Category::where('id', $data['category_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'category_id' => $data['category_id']]);
        }
    }
    public function addEditCategory(Request $request, $id = null)
    {
        Session::put('page', 'categories');

        if ($id == "") {
            $title = "Add Category";
            $category = new Category;
            $getCategory = array();
            $message = "Category added Successfully";
        } else {
            $title = "Edit Category";
            $category = Category::find($id);
            $getCategory = Category::with('subCategories')->where(['parent_id' => 0, 'section_id' => $category['section_id']])->get();
            $message = "Category Updated Successfully";
        }
        // Get All Sections
        $getSections = Section::get()->toArray();
        if ($request->isMethod('post')) {
            $data = $request->all();
           // echo "<pre>"; print_r($data); die();
            $request->validate([
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'section_id' => 'required|numeric',
                'url' => 'required',
            ]);

            if($data['category_discount']==''){
                $data['category_discount'] = 0;
            }
            // photo
            if ($request->has('category_image')) {
                $image_temp = $request->file('category_image');
                if ($image_temp->isValid()) {
                    $extension = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'frontend/images/categoryImages/' . $imageName;

                    Image::make($image_temp)->save($imagePath);
                    $category->category_image = $imageName;
                }
            } else {
                $category->category_image = "";
            }

            $category->section_id = $data['section_id'];
            $category->parent_id = $data['parent_id'];
            $category->category_name = $data['category_name'];
            $category->category_discount = $data['category_discount'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->meta_title = $data['meta_title'];
            $category->meta_description = $data['meta_description'];
            $category->meta_keyword = $data['meta_keyword'];
            $category->status = 1;
            $category->save();

            return redirect('superadmin/categories')->with('success_message', $message);
        }
        return view('superadmin.category.add_edit_category')->with(compact('title', 'category', 'getSections', 'getCategory'));
    }
    public function appendCategoryLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            
            $getCategory = Category::with('subCategories')->where(['parent_id' => 0, 'section_id' => $data['section_id']])->get()->toArray();
//echo "<pre>"; print_r($getCategory); die();
            return view('superadmin.category.append_category_level')->with(compact('getCategory'));
        }
    }
     // Delete category
     public function deleteCategorys($id)
     {
         Category::where('id', $id)->delete();
         $message = "Categorys Deleted Successfully";
         return redirect()->back()->with('success_message',  $message);
     }
     // Delete Category image
     public function deleteCategoryImage($id)
     {
        $categoryImage = Category::select("category_image")->where('id', $id)->first();
         $imagePath = 'frontend/images/categoryImages/';
         if(file_exists($imagePath.$categoryImage->category_image)){
         unlink($imagePath.$categoryImage->category_image); 
         }
         Category::where('id', $id)->update(['category_image'=>'']);
           $message = "Category Image Deleted Successfully";
         return redirect()->back()->with('success_message',  $message);
     }
}
