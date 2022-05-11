<?php

namespace App\Domain\Network\Infrastructure\Models;

use App\Domain\Common\Infrastructure\Models\DomainModel;

class NetworkSupplyModel extends DomainModel
{
    public $table = 'network_supply';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'max_supply',
        'total_supply',
        'circulating_supply',
        'locked_supply',
        'treasury_supply',
        'reserve_supply',
        'live_stake',
        'active_stake',
        'record_date',
    ];
}
