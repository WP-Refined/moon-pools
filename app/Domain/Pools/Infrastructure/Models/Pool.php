<?php

namespace App\Domains\Pools\Infrastructure\Models;

class Pool
{
    public bool $increment = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected array $fillable = [
        'id', // Populated from external source
        'pool_id',
        'pool_id_bech32',
        'db_ticker', // TODO: Map field to better names in Moon Pools
        'db_name',
        'db_url',
        'db_description',
        'total_stake',
        'rewards_epoch',
        'tax_ratio',
        'tax_fix',
        'roa',
        'blocks_epoch',
        'blocks_lifetime',
        'stamp_strike',
        'hist_roa',
        'hist_bpe',
        'pledge',
        'hash_id',
        'ticker_orig',
        'delegators',
        'pledged',
        'roa_lifetime',
        'luck_lifetime',
        'latest_bv',
        'ha_id',
        'ticker_rechecked',
        'group_basic',
        'tax_real',
        'active_stake',
        'active_blocks',
        'direct',
        'saturated',
        'rank',
        'handles', // TODO: Json object of social media handles/icon url..
        'blocks_estimated',
        'metric',
        'stake_x_deleg',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected array $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}
