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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postal_code');
            $table->string('order_status');
            $table->string('payment_method');
            $table->string('shipping_method');
            $table->string('payment_status');
            $table->string('amount');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('roamer_id')->unsigned();
            $table->json('shipment_address');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('roamer_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
};
