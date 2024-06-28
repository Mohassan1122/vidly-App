<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_bank_details', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('company_account_name');
            $table->string('company_Bank_name');
            $table->string('company_account_number');
            $table->string('bank_sort_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_bank_details');
    }
};
