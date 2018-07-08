<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attach_id');
            $table->integer('sort_order');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('slides_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('slide_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('link')->nullable();

            $table->unique(['slug', 'slide_id', 'locale']);
            $table->foreign('slide_id')->references('id')->on('slides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
        Schema::dropIfExists('slides_translations');
    }
}
