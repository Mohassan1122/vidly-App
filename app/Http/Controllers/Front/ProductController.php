<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function listing()
    {
       $url = Route::getFacadeRoot()->current()->uri();
       $categoryCount = Category::where(['url'=>$url, 'status'=>1])->count();
       if ($categoryCount>0) {
        $categoryDetails = Category::categoryDetails($url);

        $categoryProduct = Product::with('brand')->whereIn('category_id',$categoryDetails['catIds'])->where('status',1)->paginate(3);
        //dd($categoryDetails);
        // echo 'it exist'; die;
        return view('frountend.products.listing')->with(compact('categoryDetails','categoryProduct'));
       }else{
        abort(404);
       }

    }
}
