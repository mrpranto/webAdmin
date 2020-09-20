<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizeBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customize_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ads_id');
            $table->string('image');
            $table->string('title');
            $table->string('link');
            $table->timestamps();
            $table->foreign('ads_id')->references('id')->on('ads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customize_banners');
    }
}
