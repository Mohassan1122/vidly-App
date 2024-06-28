<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::prefix('/superadmin')->namespace('App\Http\Controllers\Admin')->group(function () {
    // Adin Lodin
    Route::match(['get', 'post'], 'login', 'AdminController@login');    // Admin Dashboard
    Route::group(['middleware' => ['superadmin']], function () {
        // dashboard
        Route::get('dashboard', 'AdminController@dashboard');
        // logout
        Route::get('logout', 'AdminController@logout');
        // Update SuperAdmin Password
        Route::match(['get', 'post'], 'update-admin-password', 'AdminController@updateAdminPassword');
        Route::post('check-current-password', 'AdminController@checkAdminPassword');
        // Update SuperAdmin Details
        Route::match(['get', 'post'], 'update-superadmin-details', 'AdminController@updateSuperAdminDetail');
        // update Admin Details
        Route::match(['get', 'post'], 'update-admin-details/{slug}', 'AdminController@updateAdminDetail');
        // View Super Admin and Admin Information
        Route::get('view-admin-details/{id}', 'AdminController@viewAdminDetails');
        // update admin status
        Route::post('update-admin-status', 'AdminController@updateAdminStatus');

        // View  Admin details
        Route::get('admins/{type?}', 'AdminController@admins');

        Route::post('change-state', 'AdminController@updateCountryStatus');

        // Section Modules
        Route::get('sections', 'SectionController@sections');
        // Section Modules
        Route::get('delete-section/{id}', 'SectionController@deleteSections');
        // Add Edit Section
        Route::match(['get', 'post'], 'add-edit-section/{id?}', 'SectionController@addEditSections');
        // update Section status
        Route::post('update-section-status', 'SectionController@updateSectionStatus');

        // Brands Modules
        Route::get('brands', 'BrandController@brands');
        // Brands Modules
        Route::get('delete-brand/{id}', 'BrandController@deleteBrands');
        // Add Edit Brands
        Route::match(['get', 'post'], 'add-edit-brand/{id?}', 'BrandController@addEditBrands');
        // update Brands status
        Route::post('update-brand-status', 'BrandController@updateBrandStatus');

        //  category Module
        Route::get('categories', 'CategoryController@categories');
        // update Section status
        Route::post('update-category-status', 'CategoryController@updateCategoryStatus');
        // Add Edit Section
        Route::match(['get', 'post'], 'add-edit-category/{id?}', 'CategoryController@addEditCategory');
        Route::get('append-category-level', 'CategoryController@appendCategoryLevel');
        Route::get('delete-category/{id}', 'CategoryController@deleteCategorys');
        Route::get('delete-category-image/{id}', 'CategoryController@deleteCategoryImage');


        //  Products Module
        Route::get('products', 'ProductController@products');
        Route::post('update-product-status', 'ProductController@updateProductStatus');
        Route::get('delete-product/{id}', 'ProductController@deleteProducts');
        // Add Edit Section
        Route::match(['get', 'post'], 'add-edit-product/{id?}', 'ProductController@addEditProduct');
        Route::get('delete-product-image/{id}', 'ProductController@deleteProductImage');
        Route::get('delete-product-video/{id}', 'ProductController@deleteProductVideo');

        // Products Attributes
        Route::match(['get', 'post'], 'add-edit-attributes/{id}', 'ProductController@addAttributes');
        Route::post('update-attribute-status', 'ProductController@updateAttributeStatus');
        Route::post('add-edit-attributes/{id}', 'ProductController@addEditAttributes');
        Route::match(['get', 'post'], 'add-images/{id}', 'ProductController@addImages');
        Route::post('update-image-status', 'ProductController@updateImageStatus');
        Route::get('delete-image/{id}', 'ProductController@deleteImage');
    });
});

Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/', 'IndexController@index');

    // Listing Categories
    try {
        $caturl = Category::select('url')->where('status', 1)->get()->pluck('url')->toArray();
        // dd($caturl);
        foreach ($caturl as $key => $url) {
            Route::get('/'.$url, 'ProductController@listing');
        }
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
});