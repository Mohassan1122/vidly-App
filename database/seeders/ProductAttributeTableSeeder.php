<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributeRecords = [
            ['id'=>1, 'product_id'=>2,'size'=>'Small','price'=>1200,'stock'=>10,'sku'=>'RC001-S','status'=>1],
            ['id'=>2, 'product_id'=>2,'size'=>'Medium','price'=>1500,'stock'=>12,'sku'=>'RC001-M','status'=>1],
            ['id'=>3, 'product_id'=>2,'size'=>'Large','price'=>1800,'stock'=>20,'sku'=>'RC001-L','status'=>1],
           ];
           ProductAttribute::insert($attributeRecords);
    }

}
