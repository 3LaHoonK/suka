<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table ->increments('id');
            $table ->string('slug')->unique();
            $table ->integer('category_id')->nullable()->unsigned();
            $table ->integer('product_id')->nullable()->unsigned();
            $table ->integer('brand_id')->nullable()->unsigned();
            $table ->boolean('is_active')->nullable()->default('1');
            $table->unique(['category_id','product_id','brand_id']);
            $table ->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table ->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table ->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('tags');
    }
}
