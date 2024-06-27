<?php

namespace Database\Seeders;

use App\Models\SuperAdmin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuperAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
         ['id'=>2, 'name'=>'Superadmin2','type'=>'superadmin', 'admin_id'=>1,'mobile'=>'0908776565','email'=>'admin@gmail.com','password'=>'$2y$10$is8xks3LHuM0E4kjRF7uHeDDMLyGWuYXdJ1udE4KcSepbCw3gH34u','image'=>'null','status'=>1]
        ];
        SuperAdmin::insert($adminRecords);
    }
}