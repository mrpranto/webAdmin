<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('display_type_id')->nullable();
            $table->string('name');
            $table->string('admob_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->integer('click_between')->nullable();
            $table->boolean('customize_banner')->default(false);
            $table->timestamps();

            $table->foreign('display_type_id')->references('id')->on('display_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
