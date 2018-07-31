<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNpRegionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('np_regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("nameru");
            $table->string("regionref");
            $table->string("capitalregionref");
            $table->index(['name', 'nameru', 'regionref', 'capitalregionref']);
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
        Schema::dropIfExists('np_regions');
    }
}
