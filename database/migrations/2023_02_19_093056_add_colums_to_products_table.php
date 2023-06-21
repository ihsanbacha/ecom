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
        Schema::table('products', function (Blueprint $table) {
            $table->string('lead_time')->after('warranty');
            $table->string('tax')->after('warranty');
            $table->string('tax_type')->after('warranty');
            $table->integer('is_promo')->after('warranty');
            $table->integer('is_featured')->after('warranty');
            $table->integer('is_discounted')->after('warranty');
            $table->integer('is_tranding')->after('warranty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
