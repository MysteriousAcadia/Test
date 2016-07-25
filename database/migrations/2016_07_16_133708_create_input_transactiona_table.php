<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputTransactionaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_transactions', function(Blueprint $table){
            $table->increments('id');
            $table->integer('store_id');
            $table->integer('user_id');
            $table->string('vehicle_no');
            $table->integer('regular');
            $table->integer('damaged');
            $table->integer('transport_damage');
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
        Schema::drop('input_transactions');
    }
}
