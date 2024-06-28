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
        Schema::create('company_business_details', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_city');
            $table->string('company_state');
            $table->string('company_country');
            $table->string('company_pincode');
            $table->string('company_mobile');
            $table->string('company_email');
            $table->string('license_number');
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
        Schema::dropIfExists('company_business_details');
    }
};
