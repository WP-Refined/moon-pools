<?php

namespace App\Domain\Pools\Infrastructure\Models;

use App\Domain\Common\Infrastructure\Models\DomainModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoolHistoryModel extends DomainModel
{
    public $table = 'pool_history';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pool_id',
        'epoch',
        'blocks',
        'active_stake',
        'active_size',
        'delegators_count',
        'rewards',
        'fees',
    ];

    public function pool(): BelongsTo
    {
        return $this->belongsTo(PoolModel::class);
    }
}
