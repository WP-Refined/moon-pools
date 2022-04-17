<?php

namespace App\Domain\Pools\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Repository\ModelRepository;
use App\Domain\Pools\Infrastructure\Models\PoolDetailModel;

class PoolDetailRepository extends ModelRepository
{
    public function __construct(PoolDetailModel $model)
    {
        parent::__construct($model);
    }
}