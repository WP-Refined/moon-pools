<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_supply', function (Blueprint $table) {
            $table->id();
            $table->integer('max_supply')->unsigned();
            $table->integer('total_supply')->unsigned();
            $table->integer('circulating_supply')->unsigned();
            $table->integer('locked_supply')->unsigned();
            $table->integer('treasury_supply')->unsigned();
            $table->integer('reserve_supply')->unsigned();
            $table->integer('live_stake')->unsigned();
            $table->integer('active_stake')->unsigned();
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
        Schema::dropIfExists('network_supply');
    }
};
