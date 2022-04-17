<?php

namespace Database\Seeders;

use App\Domain\Pools\Infrastructure\Models\PoolDetailModel;
use App\Domain\Pools\Infrastructure\Models\PoolModel;
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
    }
}
