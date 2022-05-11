<?php

namespace Database\Seeders;

use App\Domain\Network\Infrastructure\Models\NetworkSupplyModel;
use App\Domain\Pools\Infrastructure\Models\PoolDetailModel;
use App\Domain\Pools\Infrastructure\Models\PoolModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        PoolModel::factory(10)->create()->each(function ($pool) {
            PoolDetailModel::factory()->create([
                'id' => $pool->id,
                'hex' => $pool->hex,
            ]);
        });

        for ($i = 0; $i <= 10; $i++) {
            $supplyIncrement = rand(0, 50000);
            NetworkSupplyModel::factory(1)->create([
                'circulating_supply' => 32412601976210393 + $supplyIncrement,
                'locked_supply' => 125006953355 + $supplyIncrement,
                'live_stake' => 23204950463991654 + $supplyIncrement,
                'active_stake' => 22210233523456321 + $supplyIncrement,
                'record_date' => Carbon::now()->addDays($i)->format('Y-m-d'),
            ]);
        }
    }
}
