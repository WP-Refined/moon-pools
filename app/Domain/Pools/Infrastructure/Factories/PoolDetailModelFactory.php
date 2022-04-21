<?php

namespace App\Domain\Pools\Infrastructure\Factories;

use App\Domain\Pools\Infrastructure\Models\PoolDetailModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoolDetailModelFactory extends Factory
{
    protected $model = PoolDetailModel::class;

    public function definition(): array
    {
        $poolName = str_replace('.', '', $this->faker->text(15));
        $ticker = strtoupper(substr($poolName, -5));

        return [
            'id' => 'pool'.$this->faker->shuffleString('1qzlwlpcsgflr9z3f24fg836tyq45p0kf5cnrp20s8v0psp6tdkx'),
            'hex' => $this->faker->shuffleString('00beef8710427e328a29555283c74b202b40bec9a62630a9f03b1e18'),
            'name' => $poolName,
            'ticker' => $ticker,
            'description' => $this->faker->sentence(),
            'website' => $this->faker->domainName,
            'ref_url' => $this->faker->domainName.'/p.json',
            'ref_hash' => md5($this->faker->word),
            'vrf_key' => md5($this->faker->word),
            'blocks_minted' => $this->faker->numberBetween(),
            'blocks_epoch' => $this->faker->numberBetween(),
            'live_stake' => (string) $this->faker->numberBetween(),
            'live_size' => $this->faker->randomFloat(20),
            'live_saturation' => $this->faker->randomFloat(20, 0, 100),
            'live_delegators' => $this->faker->randomFloat(20),
            'active_stake' => (string) $this->faker->numberBetween(),
            'active_size' => $this->faker->randomFloat(20),
            'declared_pledge' => (string) $this->faker->numberBetween(),
            'live_pledge' => (string) $this->faker->numberBetween(),
            'margin_cost' => $this->faker->randomFloat(20, 0, 5),
            'fixed_cost' => '340000000',
            'reward_account' => 'stake'.$this->faker->shuffleString('1uxkptsa4lkr55jleztw43t37vgdn88l6ghclfwuxld2eykgpgvg3f'),
            'owners' => json_encode([
                'stake'.$this->faker->shuffleString('1u98nnlkvkk23vtvf9273uq7cph5ww6u2yq2389psuqet90sv4xv9v'),
            ]),
            'registration' => json_encode([
                $this->faker->shuffleString('1u98nnlkvkk23vtvf9273uq7cph5ww6u2yq2389psuqet90sv4xv9v'),
            ]),
            'retirement' => json_encode([
                $this->faker->shuffleString('1u98nnlkvkk23vtvf9273uq7cph5ww6u2yq2389psuqet90sv4xv9v'),
            ]),
        ];
    }
}
