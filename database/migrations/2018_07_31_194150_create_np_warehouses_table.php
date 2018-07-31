<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNpWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('np_warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("sitekey");
            $table->string("description");
            $table->string("descriptionru");
            $table->string("shortaddress");
            $table->string("shortaddressru");
            $table->string("typeofwarehouse");
            $table->string("ref");
            $table->integer("number");
            $table->string("cityref");
            $table->string("citydescription");
            $table->string("citydescriptionru");
            $table->string("warehousestatus");
            $table->index(['siteky']);
            $table->index(['description']);
            $table->index(['descriptionru']);
            $table->index(['shortaddress']);
            $table->index(['shortaddressru']);
            $table->index(['ref']);
            $table->index(['cityref']);
            $table->index(['citydescription']);
            $table->index(['citydescriptionru']);
            $table->index(['warehousestatus']);
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
        Schema::dropIfExists('np_warehouses');
    }
}
