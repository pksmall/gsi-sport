<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_ua')->nullable();
            $table->string('title_en')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ua')->nullable();
            $table->text('description_en')->nullable();
            $table->text('keywords')->nullable();
            $table->text('keywords_ua')->nullable();
            $table->text('keywords_en')->nullable();
            $table->string('title_shop');
            $table->string('owner');
            $table->string('address');
            $table->string('address_ua')->nullable();
            $table->string('address_en')->nullable();
            $table->string('geocode')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->text('open')->nullable();
            $table->text('open_ua')->nullable();
            $table->text('open_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
