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
        Schema::create('product_varient_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->text('options')->nullable();
            $table->boolean('in_stock')->nullable();
            $table->decimal('price',15,2)->nullable();
            $table->decimal('s_price',15,2)->nullable();
            $table->decimal('p_price',15,2)->nullable();
            $table->integer('qty')->nullable();
            $table->string('seller_sku')->nullable();
            $table->decimal('amount',15,2)->default(0);
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('product_varient_options');
    }
};
