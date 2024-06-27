<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use App\Models\CompanyBankDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CompanyBusinessDetail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use WisdomDiala\Countrypkg\Models\State;
use WisdomDiala\Countrypkg\Models\Country;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        return view('superadmin.dashboard');
    }

    public function login(Request $request)
    {

        // echo "<pre>"; print_r(bcrypt('daddy1122')); die();
        if ($request->isMethod('post')) {
            $data = $request->all();
            $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
                'publish_at' => 'nullable|date',
            ]);
            if (Auth::guard('superadmin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('superadmin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Invalid Email or Password');
            }
        }
        return view('superadmin.login');
    }

    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect('superadmin/login');
    }
    public function updateAdminPassword(Request $request)
    {
        Session::put('page', 'update-admin-password');
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_password'], Auth::guard('superadmin')->user()->password)) {
                if ($data['comfirm_password'] == $data['new_password']) {
                    SuperAdmin::where('id',  Auth::guard('superadmin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    return redirect()->back()->with('success_message', 'Password is Successfully Updated');
                } else {
                    return redirect()->back()->with('error_message', 'New Password is Incorrect');
                }
            } else {
                return redirect()->back()->with('error_message', 'Password is Incorrect');
            }
        }
        $superAdminDetails = SuperAdmin::where('email', Auth::guard('superadmin')->user()->email)->first()->toArray();
        return view('superadmin.settings.update-admin-password')->with(compact('superAdminDetails'));
    }
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('superadmin')->user()->password)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    public function updateSuperAdminDetail(Request $request)
    {
        Session::put('page', 'update-superadmin-detail');
        if ($request->isMethod('post')) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            $request->validate([
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile' => 'required|numeric',
            ]);
            // photo
            if ($request->has('admin_image')) {
                $image_temp = $request->file('admin_image');
                if ($image_temp->isValid()) {
                    $extension = $image_temp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'admin/images/photos/' . $imageName;

                    Image::make($image_temp)->save($imagePath);
                }
            } else if (!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            } else {
                $imageName = '';
            }


            SuperAdmin::where('id',  Auth::guard('superadmin')->user()->id)->update(['name' => $data['admin_name'], 'mobile' => $data['mobile'], 'image' => $imageName]);
            return redirect()->back()->with('success_message', 'Admin Details is Successfully Updated');
        }
        return view('superadmin.settings.update-superadmin-detail');
    }
    // admin details
    public function updateAdminDetail($slug, Request $request)
    {
        if ($slug == "personal") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die();
                $request->validate([
                    'company_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'company_mobile' => 'required|numeric',
                    'company_address' => 'required',
                    'company_city' => 'required',
                    'company_state' => 'required',
                    'company_country' => 'required',
                    'company_pincode' => 'required',
                ]);
                // photo
                if ($request->has('company_image')) {
                    $image_temp = $request->file('company_image');
                    if ($image_temp->isValid()) {
                        $extension = $image_temp->getClientOriginalExtension();
                        $imageName = rand(111, 99999) . '.' . $extension;
                        $imagePath = 'admin/images/photos/' . $imageName;

                        Image::make($image_temp)->save($imagePath);
                    }
                } else if (!empty($data['current_company_image'])) {
                    $imageName = $data['current_company_image'];
                } else {
                    $imageName = '';
                }
                $country = Country::where('id', $data['company_country'])->value("name");
                $state = State::where('id', $data['company_state'])->value("name");

                // update in superAdmin table
                SuperAdmin::where('id',  Auth::guard('superadmin')->user()->id)->update(['name' => $data['company_name'], 'mobile' => $data['company_mobile'], 'image' => $imageName]);

                // update in Admin table
                Admin::where('id',  Auth::guard('superadmin')->user()->admin_id)->update(['name' => $data['company_name'], 'address' => $data['company_address'], 'city' => $data['company_city'], 'state' => $state, 'country' => $country, 'pincode' => $data['company_pincode'], 'mobile' => $data['company_mobile']]);


                return redirect()->back()->with('success_message', 'Company Personal Details is Successfully Updated');
            }

            $AdminDetails = Admin::where('id', Auth::guard('superadmin')->user()->admin_id)->first()->toArray();
        } elseif ($slug == "business") {

            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die();
                $request->validate([
                    'company_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'company_mobile' => 'required|numeric',
                    'company_address' => 'required',
                    'company_city' => 'required',
                    'company_state' => 'required',
                    'company_country' => 'required',
                    'company_pincode' => 'required',
                    'license_number' => 'required',
                ]);
                $country = Country::where('id', $data['company_country'])->value("name");
                $state = State::where('id', $data['company_state'])->value("name");
                //die($country);
                // update in Admin table
                CompanyBusinessDetail::where('admin_id',  Auth::guard('superadmin')->user()->admin_id)->update(['company_name' => $data['company_name'], 'company_address' => $data['company_address'], 'company_city' => $data['company_city'], 'company_state' => $state, 'company_country' => $country, 'company_pincode' => $data['company_pincode'], 'company_mobile' => $data['company_mobile'], 'license_number' => $data['license_number']]);


                return redirect()->back()->with('success_message', 'Company Business Details is Successfully Updated');
            }

            $AdminDetails = CompanyBusinessDetail::where('admin_id', Auth::guard('superadmin')->user()->admin_id)->first()->toArray();
        } elseif ($slug == "bank") {
            if ($request->isMethod('post')) {
                $data = $request->all();
                //echo "<pre>"; print_r($data); die();
                $request->validate([
                    'company_account_name' => 'required',
                    'company_Bank_name' => 'required',
                    'company_account_number' => 'required|numeric',
                    'bank_sort_code' => 'required|numeric'
                ]);
                // update in Admin table
                CompanyBankDetail::where('admin_id',  Auth::guard('superadmin')->user()->admin_id)->update(['company_account_name' => $data['company_account_name'], 'company_Bank_name' => $data['company_Bank_name'], 'company_account_number' => $data['company_account_number'], 'bank_sort_code' => $data['bank_sort_code']]);


                return redirect()->back()->with('success_message', 'Company Bank Details is Successfully Updated');
            }
            $AdminDetails = CompanyBankDetail::where('admin_id', Auth::guard('superadmin')->user()->admin_id)->first()->toArray();
        }

        $countries = Country::all();
        return view('superadmin.settings.update-admin-detail')->with(compact('slug', 'AdminDetails', 'countries'));
    }
    public function updateCountryStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            $data['states'] = State::where('country_id', $data['country_id'])->get(["name", "id"]);
            return response()->json($data);
        }
    }
    public function admins($type = null)
    {

        $admins = SuperAdmin::query();
        if (!empty($type)) {
            $admins = $admins->where('type', $type);
            $title = ucfirst($type) . 's';
            Session::put('page', 'view_' . strtolower($title));
        } else {
            $title = 'All SuperAdmins/Admins';
            Session::put('page', 'view_all');
        }



        $admins = $admins->get()->toArray();
        return view('superadmin.admins.admins')->with(compact('admins', 'title'));
    }

    public function viewAdminDetails($id)
    {
        $adminDetails = SuperAdmin::with('adminPersonal', 'adminBusiness', 'adminBank')->where('id', $id)->first();
        $adminDetails = json_decode(json_encode($adminDetails), true);

        return view('superadmin.admins.view-admin-detail')->with(compact('adminDetails'));
    }
    // update admin status
    public function updateAdminStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            //echo "<pre>"; print_r($data); die();
            if ($data['status'] == "Active") {
                $status = 0;
            } else {
                $status = 1;
            }

            SuperAdmin::where('id', $data['admin_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'admin_id' => $data['admin_id']]);
        }
    }
}