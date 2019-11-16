<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountToTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->float('product_discount')->after('product_price');
            $table->tinyInteger('is_sale')->after('is_featured');
            $table->tinyInteger('is_offer')->after('is_sale');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->dropColumn('product_discount');
            $table->dropColumn('is_sale');
            $table->dropColumn('is_offer');
        });
    }
}
