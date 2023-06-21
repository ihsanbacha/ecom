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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->string('customer_name')->default('0');
            $table->string('customer_email')->default('0');
            $table->string('customer_mobil')->default('0');
            $table->string('customer_address')->default('0');
            $table->string('customer_city')->default('0');
            $table->string('customer_state')->default('0');
            $table->string('customer_zip_code')->default('0');
            $table->integer('coupon_code')->default('0');
            $table->integer('coupon_value')->default('0');
            $table->integer('order_status')->default('0');
            $table->string('payment_type')->default('0');
            $table->string('payment_status')->default('0');
            $table->string('payment_id')->default('0');
            $table->string('txn_id')->default('0');
            $table->integer('total_amt')->default('0');
            $table->text('track_detail')->default('0');
            $table->string('added_on')->default('0');
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
        Schema::dropIfExists('orders');
    }
};
