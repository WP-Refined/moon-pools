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

    public $keyType = 'string';

    public $table = 'pools';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id', // Bech 32 Pool ID
        'hex',
        'retiring_epoch',
        'retired_epoch',
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(PoolDetailModel::class, 'id', 'id');
    }

    public function history(): HasMany
    {
        return $this->hasMany(PoolHistoryModel::class, 'pool_id');
    }

    public function scopeSearch($query, string $filter = null)
    {
        return $query->whereHas('detail', function ($q) use ($filter) {
            if ($filter) {
                $q->where('name', 'LIKE', '%'.$filter.'%')
                    ->orWhere('ticker', 'LIKE', '%'.$filter.'%');
            }
        });
    }
}
