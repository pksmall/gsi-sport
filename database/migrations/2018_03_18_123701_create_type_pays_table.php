<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_pays', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('type_pays_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pay_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description')->nullable();

            $table->unique(['pay_id', 'locale']);
            $table->foreign('pay_id')->references('id')->on('type_pays')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_pays');
        Schema::dropIfExists('type_pays_translations');
    }
}
