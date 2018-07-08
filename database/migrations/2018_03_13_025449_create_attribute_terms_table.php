<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_filter')->default(true);
            $table->tinyInteger('sort_id');
            $table->integer('sort_order');
            $table->integer('attribute_id');
            $table->string('image_id')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('attribute_terms_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('term_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');

            $table->unique(['slug', 'term_id', 'locale']);
            $table->foreign('term_id')->references('id')->on('attribute_terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_terms');
        Schema::dropIfExists('attribute_terms_translations');
    }
}
