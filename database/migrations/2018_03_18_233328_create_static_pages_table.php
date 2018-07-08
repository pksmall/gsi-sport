<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaticPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('active_title')->default(true);
            $table->boolean('active_breadcrumbs')->default(true);
            $table->boolean('is_menu')->default(false);
            $table->boolean('is_second_menu')->default(false);
            $table->boolean('is_footer_menu')->default(false);
            $table->integer('sort_order');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('static_pages_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->unique(['slug', 'page_id', 'locale']);
            $table->foreign('page_id')->references('id')->on('static_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
        Schema::dropIfExists('static_pages_translations');
    }
}
