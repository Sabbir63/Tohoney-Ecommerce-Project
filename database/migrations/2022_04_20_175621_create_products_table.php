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
            $table->id();
            $table->string('product_name',100);
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->float('product_price',8,2);
            $table->integer('user_id');
            $table->integer('product_quantity');
            $table->mediumText('product_short_description');
            $table->longText('product_long_description');
            $table->integer('product_alart_quamtity');
            $table->string('product_image',50);
            $table->timestamps();
            $table->softDeletes();
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
