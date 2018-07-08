<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechnologiesCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('tech_c_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('technologies_category_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description')->nullable();

            $table->string('slug');

            $table->unique(['slug', 'technologies_category_id', 'locale']);
            $table->foreign('technologies_category_id')->references('id')->on('technologies_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies_categories');
        Schema::dropIfExists('tech_c_translations');
    }
}
