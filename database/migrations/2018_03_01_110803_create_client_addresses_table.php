<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('type_id');
            $table->string('country');
            $table->string('region');
            $table->string('city');
            $table->string('address');
            $table->string('address_detail')->nullable();
            $table->string('zipcode');
            $table->string('delivery_id')->nullable();
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
        Schema::dropIfExists('client_addresses');
    }
}
