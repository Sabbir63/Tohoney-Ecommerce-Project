<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartorders', function (Blueprint $table) {
          $table->id();
          $table->integer('user_id');
          $table->string('customer_name');
          $table->string('customer_email');
          $table->string('customer_phone');
          $table->integer('customer_country_id');
          $table->integer('customer_city_id');
          $table->string('customer_address');
          $table->string('customer_postcode');
          $table->integer('discount');
          $table->float('subtotal');
          $table->float('total');
          $table->text('customer_massage');
          $table->integer('customer_payment')->comment('1=carit card, 2=cod');
          $table->integer('payment_status')->comment('1=pending , 2=Paid');
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
        Schema::dropIfExists('cartorders');
    }
}
