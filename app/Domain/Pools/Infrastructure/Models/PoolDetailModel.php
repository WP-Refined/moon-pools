<?php

namespace App\Domain\Pools\Infrastructure\Models;

use App\Domain\Common\Infrastructure\Models\DomainModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoolDetailModel extends DomainModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'hex',
        'vrf_key',
        'blocks_minted',
        'blocks_epoch',
        'live_stake',
        'live_size',
        'live_saturation',
        'live_delegators',
        'active_stake',
        'active_size',
        'declared_pledge',
        'live_pledge',
        'margin_cost',
        'fixed_cost',
        'reward_account',
        'owners', // collection/json
        'registration', // collection/json
        'retirement', // collection/json
    ];

    public function pool(): BelongsTo
    {
        return $this->belongsTo(PoolModel::class);
    }
}
