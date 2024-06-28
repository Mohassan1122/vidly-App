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
         ['id'=>2, 'name'=>'Superadmin2','type'=>'admin', 'admin_id'=>1,'mobile'=>'0908776565','email'=>'admin@gmail.com','password'=>'$2a$12$d5riqB/YCRiCud0BzTJLouZMGvSWc6CxspVFbcfJN3MzPMMeGHQG6','image'=>'null','status'=>0]
        ];
        SuperAdmin::insert($adminRecords);
    }
}
