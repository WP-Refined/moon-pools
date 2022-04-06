<?php

namespace App\Domains\Pools\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\ModelRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PoolRepository extends ModelRepository
{
    public function findPools(?string $filter): LengthAwarePaginator
    {
        return $this->model->paginate(20);
    }
}