<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>1, 'name'=>'admin','address'=>'adminAddress', 'city'=>'Niger', 'state'=>'Niger', 'country'=>'Nigeria', 'pincode'=>'110001','mobile'=>'0908776565','email'=>'admin@gmail.com','status'=>0]
           ];
           Admin::insert($adminRecords);
    }
}
