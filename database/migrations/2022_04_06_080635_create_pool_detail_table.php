<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_detail', function (Blueprint $table) {
            $table->string('id', 50)->primary(); // Bech 32 Pool ID
            $table->string('hex', 50)->nullable();
            $table->string('name');
            $table->string('vrf_key');
            $table->integer('blocks_minted');
            $table->integer('blocks_epoch');
            $table->string('live_stake');
            $table->float('live_size');
            $table->float('live_saturation');
            $table->float('live_delegators');
            $table->string('active_stake');
            $table->float('active_size');
            $table->string('declared_pledge');
            $table->string('live_pledge');
            $table->float('margin_cost');
            $table->float('fixed_cost');
            $table->string('reward_account');
            $table->text('owners');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_metadata');
    }
};
