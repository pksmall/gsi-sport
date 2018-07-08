<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_filter')->default(true);
            $table->tinyInteger('sort_id');
            $table->integer('sort_order');
            $table->string('only_categories')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('item_attributes_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attribute_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');

            $table->unique(['slug', 'attribute_id', 'locale']);
            $table->foreign('attribute_id')->references('id')->on('item_attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_attributes');
        Schema::dropIfExists('item_attributes_translations');
    }
}
