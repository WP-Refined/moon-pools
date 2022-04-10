<?php

namespace App\Domain\Pools\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Repository\ModelRepository;
use App\Domain\Pools\Infrastructure\Models\PoolModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PoolRepository extends ModelRepository
{
    public function __construct(PoolModel $model)
    {
        parent::__construct($model);
    }

    public function findPools(?string $filter): LengthAwarePaginator
    {
        return $this->model->paginate(20);
    }

    /**
     * @param  array|Collection  $pools
     * @param  string  $uniqueBy
     * @return int
     */
    public function upsertPools(array|Collection $pools, string $uniqueBy = 'id'): int
    {
        return $this->model->upsert(!is_array($pools) ? $pools->toArray() : $pools, $uniqueBy);
    }

    public function updatePoolMetaData(string $poolId, $metaData)
    {
        //
    }
}