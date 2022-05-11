<?php

namespace App\Domain\Network\Infrastructure\Factories;

use App\Domain\Network\Infrastructure\Models\NetworkSupplyModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class NetworkSupplyModelFactory extends Factory
{
    protected $model = NetworkSupplyModel::class;
  
    public function definition(): array
    {
        return [
            'max_supply' => '45000000000000000',
            'total_supply' => '32890715183299160',
            'circulating_supply' => '32412601976210393',
            'locked_supply' => '125006953355',
            'treasury_supply' => '98635632000000',
            'reserve_supply' => '46635632000000',
            'live_stake' => '23204950463991654',
            'active_stake' => '22210233523456321',
            'record_date' => '2022-05-11',
        ];
    }
}
