<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brandRecords = [
            ['id'=>1, 'name'=>'Arrow','status'=>1],
            ['id'=>2, 'name'=>'Gaps','status'=>1],
            ['id'=>3, 'name'=>'Lee','status'=>1],
            ['id'=>4, 'name'=>'Samsung','status'=>1],
            ['id'=>5, 'name'=>'Tecno','status'=>1],
            ['id'=>6, 'name'=>'D&G','status'=>1],
            ['id'=>7, 'name'=>'G-Shock','status'=>1],
            ['id'=>8, 'name'=>'Choba','status'=>1],
            ['id'=>9, 'name'=>'LG','status'=>1],
            ['id'=>10, 'name'=>'Lenovo','status'=>1],
           ];
           Brand::insert($brandRecords);
    }
}
