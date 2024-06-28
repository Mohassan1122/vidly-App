<?php

namespace Database\Seeders;

use App\Models\CompanyBankDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyBankDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyRecords = [
            ['id'=>1, 'admin_id'=>'1','company_account_name'=>'admin admin','company_Bank_name'=>'admin bank of Nigeria','company_account_number'=>'009898766545','bank_sort_code'=>'2343']
           ];
           CompanyBankDetail::insert($companyRecords);
    }
}
