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
        return $this->model->search($filter)->paginate(20);
    }

    /**
     * @return LengthAwarePaginator
     */
    public function favouritePools(): LengthAwarePaginator
    {
        // TODO: Move static list over to config file
        return $this->model->with('detail')->whereIn('id', [
            'pool6rn463c2pl84gplffpkpxq2cs1tz3508f0vsp095ftzdqlwsrygk',
            'poolt5124pvz6k3sqql0sgrz6ckr0ft2wp0npplgffc4f38x8p95lsyd',
        ])->paginate(20);
    }
}