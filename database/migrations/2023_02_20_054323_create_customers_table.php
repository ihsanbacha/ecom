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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->string('customer_name')->default('0');
            $table->string('customer_email')->default('0');
            $table->string('customer_mobile')->default('0');
            $table->string('customer_password')->default('0');
            $table->string('customer_address')->default('0');
            $table->string('customer_city')->default('0');
            $table->string('customer_state')->default('0');
            $table->string('customer_zip')->default('0');
            $table->string('customer_company')->default('0');
            $table->string('customer_gstin')->default('0');
            $table->integer('customer_status')->default('1');
            $table->integer('customer_is_varify')->default('0');
            $table->integer('customer_is_forgot_password')->default('0');
            $table->integer('rand_id')->default('0');
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
        Schema::dropIfExists('customers');
    }
};
