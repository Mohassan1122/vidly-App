<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productRecords = [
            ['id'=>1, 'section_id'=>2,'category_id'=>5, 'brand_id'=>5, 'admin_id'=>0, 'superadmin_id'=>1, 'user_id'=>1, 'superadmin_type'=>'admin','product_name'=>'Redmi Note 11','product_code'=>'AD335','product_color'=>'blue','product_price'=>2000,'product_discount'=>10,'product_weight'=>500,'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','is_feature'=>'Yes','status'=>1],
            ['id'=>2, 'section_id'=>1,'category_id'=>8, 'brand_id'=>2, 'admin_id'=>1, 'superadmin_id'=>0, 'user_id'=>1, 'superadmin_type'=>'superadmin','product_name'=>'Red Casual T-Shirt','product_code'=>'DF453','product_color'=>'red','product_price'=>1200,'product_discount'=>20,'product_weight'=>200,'product_image'=>'','product_video'=>'','description'=>'','meta_title'=>'','meta_description'=>'','meta_keyword'=>'','is_feature'=>'Yes','status'=>1],
           ];
           Product::insert($productRecords);
    }
}