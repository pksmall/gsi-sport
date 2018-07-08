<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('type_deliveries_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('delivery_id')->unsigned();
            $table->string('locale')->index();

            $table->string('name');
            $table->text('description')->nullable();

            $table->unique(['delivery_id', 'locale']);
            $table->foreign('delivery_id')->references('id')->on('type_deliveries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_deliveries');
        Schema::dropIfExists('type_deliveries_translations');
    }
}
