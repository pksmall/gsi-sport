<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->integer('preview_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('technologies_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technology_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();

            $table->unique(['slug', 'technology_id', 'locale']);
            $table->foreign('technology_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies');
        Schema::dropIfExists('technologies_translations');
    }
}
