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

    /**
     * @param  string|null  $filter
     * @return LengthAwarePaginator
     */
    public function findPools(string $filter = null): LengthAwarePaginator
    {
        return $this->model->paginate(20);
    }
}