<?php

namespace App\Domain\Pools\Infrastructure\Factories;

use App\Domain\Pools\Infrastructure\Models\PoolModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoolModelFactory extends Factory
{
    protected $model = PoolModel::class;

    public function definition(): array
    {
        return [
            'id' => 'pool'.$this->faker->shuffleString('1qzlwlpcsgflr9z3f24fg836tyq45p0kf5cnrp20s8v0psp6tdkx'),
            'hex' => $this->faker->shuffleString('00beef8710427e328a29555283c74b202b40bec9a62630a9f03b1e18'),
            'retiring_epoch' => $this->faker->randomNumber(3),
            'retired_epoch' => $this->faker->randomNumber(3),
        ];
    }
}
