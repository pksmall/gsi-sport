<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNpCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('np_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("nameru");
            $table->string("ref");
            $table->string("regionref");
            $table->string("settlementtype");
            $table->tinyInteger("isbranch");
            $table->integer("cityid");
            $table->string("settlementtypedesc");
            $table->string("settlementtypedescru");
            $table->index(['name']);
            $table->index(['nameru']);
            $table->index(['ref']);
            $table->index(['regionref']);
            $table->index(['settlementtype']);
            $table->index(['cityid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('np_cities');
    }
}
