<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientreviews', function (Blueprint $table) {
            $table->id();
            $table->integer('cl_id');
            $table->string('cl_f_name');
            $table->string('cl_l_name');
            $table->text('cl_text');
            $table->integer('cl_rating');
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
        Schema::dropIfExists('clientreviews');
    }
}
