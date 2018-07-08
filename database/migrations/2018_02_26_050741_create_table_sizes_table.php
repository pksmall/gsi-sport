<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_sizes', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('table_size_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('table_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description');

            $table->unique(['table_id', 'locale']);
            $table->foreign('table_id')->references('id')->on('table_sizes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_sizes');
        Schema::dropIfExists('table_size_translations');
    }
}
