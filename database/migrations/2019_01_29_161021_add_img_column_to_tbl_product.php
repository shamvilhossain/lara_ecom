<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImgColumnToTblProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_product', function (Blueprint $table) {
            $table->string('product_image_lg')->after('product_image');
            $table->string('product_image_side_1')->after('product_image_lg');
            $table->string('product_image_side_1_lg')->after('product_image_side_1');
            $table->string('product_image_side_2')->after('product_image_side_1_lg');
            $table->string('product_image_side_2_lg')->after('product_image_side_2');
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
            $table->dropColumn('product_image_lg');
            $table->dropColumn('product_image_side_1');
            $table->dropColumn('product_image_side_1_lg');
            $table->dropColumn('product_image_side_2');
            $table->dropColumn('product_image_side_2_lg');
        });
    }
}
