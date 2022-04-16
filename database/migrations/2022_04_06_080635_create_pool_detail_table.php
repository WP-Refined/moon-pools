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
            $table->string('ticker', 10);
            $table->string('description');
            $table->string('website');
            $table->string('ref_url');
            $table->string('vrf_key');
            $table->integer('blocks_minted');
            $table->integer('blocks_epoch');
            $table->string('live_stake');
            $table->float('live_size', 32, 20);
            $table->float('live_saturation', 32, 20);
            $table->float('live_delegators', 32, 20);
            $table->string('active_stake');
            $table->float('active_size', 32, 20);
            $table->string('declared_pledge');
            $table->string('live_pledge');
            $table->float('margin_cost');
            $table->string('fixed_cost'); // NOTE: Implemented as string due to sync with chain
            $table->string('reward_account');
            $table->text('owners')->nullable();
            $table->text('registration')->nullable();
            $table->text('retirement')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('name');
            $table->index('ticker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_detail');
    }
};
