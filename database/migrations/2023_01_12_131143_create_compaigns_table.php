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
        Schema::create('compaigns', function (Blueprint $table) {
            $table->id();
            $table->string('compaign_name');
            $table->string('compaign_start');
            $table->string('compaign_end');
            $table->string('registeration_start');
            $table->string('registeration_end');
            $table->string('off_percent');
            $table->string('fix_amount');
            $table->string('banner_img1');
            $table->string('banner_img2');
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
        Schema::dropIfExists('compaigns');
    }
};
