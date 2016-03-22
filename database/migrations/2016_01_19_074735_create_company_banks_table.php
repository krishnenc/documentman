<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies_banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('bank_id');
            $table->string('account_no');  
            //$table->foreign('bank_id')->references('id')->on('banks');
            //$table->foreign('company_id')->references('id')->on('companies');          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('companies_banks');
         //$table->dropForeign('banks_bank_id_foreign');
         //$table->dropForeign('companies_company_id_foreign');
    }
}
