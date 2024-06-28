<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class IndexController extends Controller
{



    public function index()
    {
        $newProducts = Product::orderBy('id','Desc')->where('status',1)->limit(8)->get()->toArray();
       //dd($newProducts);
       return view('frountend.index')->with(compact('newProducts'));
    }
}
