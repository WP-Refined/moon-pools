<?php

namespace App\Domain\Pools\Infrastructure\Models;

use App\Domain\Common\Infrastructure\Models\DomainModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PoolModel extends DomainModel
{
    use SoftDeletes;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', // Bech 32 Pool ID
        'pool_hex',
        'retiring_epoch',
        'retired_epoch',
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(PoolDetailModel::class);
    }

    public function history(): HasMany
    {
        return $this->hasMany(PoolHistoryModel::class, 'pool_id');
    }
}