<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_characteristics', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('sort_id');
            $table->integer('sort_order');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('item_characteristics_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ch_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');

            $table->unique(['slug', 'ch_id', 'locale']);
            $table->foreign('ch_id')->references('id')->on('item_characteristics')->onDelete('cascade');
        });

        Schema::create('characteristics_child_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id');
            $table->integer('ch_id')->unsigned();
            $table->string('locale');

            $table->text('value');

            $table->foreign('ch_id')->references('id')->on('item_characteristics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_characteristics');
        Schema::dropIfExists('item_characteristics_translations');
        Schema::dropIfExists('characteristics_child_translations');
    }
}
