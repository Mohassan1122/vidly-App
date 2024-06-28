<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categoryRecords = [
            [
                'id' => 1,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Men',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'men',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keyword' => '',
                'status' => 1
            ],

            [
                'id' => 2,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Women',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'women',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keyword' => '',
                'status' => 1
            ],

            [
                'id' => 3,
                'parent_id' => 0,
                'section_id' => 1,
                'category_name' => 'Kids',
                'category_image' => '',
                'category_discount' => 0,
                'description' => '',
                'url' => 'kids',
                'meta_title' => '',
                'meta_description' => '',
                'meta_keyword' => '',
                'status' => 1
            ],
            [
                'id' => 4,
                'parent_id' => 1, // Assuming Electronics category ID is 1
                'section_id' => 1, // Assuming section with ID 1 exists
                'category_name' => 'Mobile Phones',
                'category_image' => 'mobiles.jpg',
                'category_discount' => 5,
                'description' => 'Category for mobile phones.',
                'url' => 'mobile-phones',
                'meta_title' => 'Mobile Phones Meta Title',
                'meta_description' => 'Mobile Phones Meta Description',
                'meta_keyword' => 'mobiles, smartphones',
                'status' => 1,
            ],
            [
                'id' => 5,
                'parent_id' => 0,
                'section_id' => 1, // Assuming section with ID 1 exists
                'category_name' => 'Electronics',
                'category_image' => 'electronics.jpg',
                'category_discount' => 10,
                'description' => 'Category for electronic items.',
                'url' => 'electronics',
                'meta_title' => 'Electronics Meta Title',
                'meta_description' => 'Electronics Meta Description',
                'meta_keyword' => 'electronics, gadgets',
                'status' => 1,
            ]
        ];
        Category::insert($categoryRecords);
    }
}