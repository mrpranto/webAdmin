<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('app_id')->nullable();
            $table->string('publisher_id')->nullable();
            $table->boolean('status')->nullable(false);
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
        Schema::dropIfExists('ad_settings');
    }
}
