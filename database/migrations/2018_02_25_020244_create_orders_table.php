<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('guest_city')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('guest_telephone')->nullable();
            $table->tinyInteger('status_id');
            $table->float('total');
            $table->integer('pay_id');
            $table->integer('delivery_id');
            $table->text('more')->nullable();
            $table->integer('mail_number')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
