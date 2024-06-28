<?php

namespace Database\Seeders;

use App\Models\CompanyBusinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyBusinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyRecords = [
            ['id'=>1, 'admin_id'=>'1','company_name'=>'admin Electronics','company_address'=>'adminAddress 223','company_city'=>'Minna','company_state'=>'Niger', 'company_country'=>'Nigeria', 'company_pincode'=>'110001', 'company_mobile'=>'0908776565','company_email'=>'admin@gmail.com', 'license_number'=>'1234567890']
           ];
           CompanyBusinessDetail::insert($companyRecords);
    }
}