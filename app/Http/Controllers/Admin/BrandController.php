<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    public function brands()
    {
        Session::put('page', 'brands');
        $brands = Brand::get()->toArray();
        //dd( $brands);
        return view('superadmin.brands.brands')->with(compact('brands'));
    }
    public function updateBrandStatus(Request $request)
    {

        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            Brand::where('id', $data['brand_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'brand_id' => $data['brand_id']]);
        }
    }
    // Delete brands
    public function deletebrands($id)
    {
        Brand::where('id', $id)->delete();
        $message = "Brand Deleted Successfully";
        return redirect()->back()->with('success_message',  $message);
    }
    // add Edit brands brands
    public function addEditBrands(Request $request, $id=null)
    {
        Session::put('page', 'brands');

        if ($id =="") {
            $title = "Add brand";
            $brand = new Brand;
            $message = "Brand added Successfully";
        }else{
            $title = "Edit brand";
            $brand = Brand::find($id);
            $message = "brand Updated Successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            $request->validate([
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u',
                
            ]);
            $brand->name = $data['brand_name'];
            $brand->status = 1;
            $brand->save();
            return redirect('superadmin/brands')->with('success_message',  $message);
        }
        return view('superadmin.brands.add_edit_brand')->with(compact('title','brand'));
    }
}
