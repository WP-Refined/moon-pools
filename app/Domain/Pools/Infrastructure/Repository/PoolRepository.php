<?php

namespace App\Domain\Pools\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Repository\ModelRepository;
use App\Domain\Pools\Infrastructure\Models\PoolModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

    public function upsertPools(array $pools, string $uniqueBy = 'pool_id'): int
    {
        return $this->model->upsert($pools, $uniqueBy);
    }

    public function updatePoolMetaData(string $poolId, $metaData)
    {
        //
    }
}