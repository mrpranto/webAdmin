<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdStatusDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_status_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ad_status_id');
            $table->string('app_id')->nullable();
            $table->string('banner_id')->nullable();
            $table->string('interstitial_id')->nullable();
            $table->string('native_id')->nullable();
            $table->timestamps();

            $table->foreign('ad_status_id')->references('id')->on('ad_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_status_details');
    }
}
