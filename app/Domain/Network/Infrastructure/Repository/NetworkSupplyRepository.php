<?php

namespace App\Domain\Network\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Repository\ModelRepository;
use App\Domain\Network\Infrastructure\Models\NetworkSupplyModel;
use Illuminate\Database\Eloquent\Collection;

class NetworkSupplyRepository extends ModelRepository
{
    public function __construct(NetworkSupplyModel $model)
    {
        parent::__construct($model);
    }

    /**
     * @param  int  $limit
     * @return array|Collection
     */
    public function recentSupply(int $limit = 5): array|Collection
    {
        return $this->model->latest()->take($limit)->get();
    }
}
