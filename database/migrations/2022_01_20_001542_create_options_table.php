<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('attribute_id')->unsigned();
            $table ->integer('product_id')->unsigned();
            $table ->unique(['attribute_id','product_id']);
            $table ->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table ->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table ->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
