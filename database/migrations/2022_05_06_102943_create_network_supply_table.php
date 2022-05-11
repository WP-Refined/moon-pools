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
            $table->string('max_supply', 50)->unsigned();
            $table->string('total_supply', 50)->unsigned();
            $table->string('circulating_supply', 50)->unsigned();
            $table->string('locked_supply', 50)->unsigned();
            $table->string('treasury_supply', 50)->unsigned();
            $table->string('reserve_supply', 50)->unsigned();
            $table->string('live_stake', 50)->unsigned();
            $table->string('active_stake', 50)->unsigned();
            $table->string('record_date', 10);

            $table->unique('record_date');
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
