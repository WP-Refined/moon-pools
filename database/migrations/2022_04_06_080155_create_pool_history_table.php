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
        Schema::create('pool_history', function (Blueprint $table) {
            $table->id();
            $table->string('pool_id', 50); // Bech 32 Pool ID
            $table->integer('epoch');
            $table->integer('blocks');
            $table->string('active_stake');
            $table->float('active_size');
            $table->integer('delegators_count');
            $table->string('rewards');
            $table->string('fees');
            $table->timestamps();
            $table->softDeletes();
            $table->index('pool_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pool_history');
    }
};
