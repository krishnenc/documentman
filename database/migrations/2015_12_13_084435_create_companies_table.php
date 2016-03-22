<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('incorporation_number')->nullable();
            $table->dateTime('incorporation_date')->nullable();
            $table->string('registered_office_address')->nullable();
            $table->string('place_of_operation')->nullable();
            $table->string('vat_registration_no')->nullable();
            $table->string('vat_registration_date')->nullable();
            $table->string('business_registration_no')->nullable();
            $table->dateTime('business_registration_date')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('municipality_license_no')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('employer_registration_no')->nullable();
            $table->string('tax_account_no')->nullable();
            $table->string('cwa_no')->nullable();
            $table->string('ceb_no')->nullable();
            $table->string('telecom_no')->nullable();
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
        Schema::drop('companies');
    }
}
