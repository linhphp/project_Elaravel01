<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cate_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('product_name');
            $table->text('desc');
            $table->text('content');
            $table->double('unit_price', 20, 2);
            $table->double('promotion_price', 20, 2);
            $table->string('image');
            $table->integer('status');
            $table->foreign('brand_id')->references('id')->on('brand_products');
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
        Schema::dropIfExists('products');
    }
}
