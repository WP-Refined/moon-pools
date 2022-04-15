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

    /**
     * @param  string|null  $filter
     * @return LengthAwarePaginator
     */
    public function findPools(string $filter = null): LengthAwarePaginator
    {
        return $this->model->paginate(20);
    }

    /**
     * @param  array|Collection  $poolData
     * @param  string  $uniqueBy
     * @return int
     */
    public function upsert(array|Collection $poolData, string $uniqueBy = 'id'): int
    {
        return $this->model->upsert(
            !is_array($poolData)
                ? $poolData->toArray()
                : $poolData,
            $uniqueBy
        );
    }
}