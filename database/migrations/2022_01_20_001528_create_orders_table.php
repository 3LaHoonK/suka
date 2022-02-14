<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table ->increments('id');
            $table ->integer('customer_id');
            $table ->string('customer_name');
            $table ->string('customer_phone');
            $table ->decimal('total',18,4)->unsigned();
            $table ->string('payment_method');
            $table ->string('status');
            $table ->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
