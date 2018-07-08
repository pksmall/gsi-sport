<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->unique()->nullable();
            $table->float('price');
            $table->float('whs_price')->nullable();
            $table->float('old_price')->nullable();
            $table->integer('qty');
            $table->integer('min_qty')->nullable();
            $table->integer('max_qty')->nullable();
            $table->boolean('store_subtract')->default(true);
            $table->integer('status_store_id')->default(1);
            $table->integer('views')->default(0);
            $table->integer('sales')->default(0);
            $table->text('youtube')->nullable();
            $table->integer('preview_id')->nullable();
            $table->boolean('is_sale')->default(false);
            $table->date('duration_sale')->nullable();
            $table->date('duration_new')->nullable();
            $table->boolean('is_catalog')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('item_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->unique(['slug', 'item_id', 'locale']);
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_translations');
    }
}
