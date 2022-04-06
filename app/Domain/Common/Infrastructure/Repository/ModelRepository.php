<?php

namespace App\Domain\Common\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Models\DomainModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class ModelRepository
{
    public function __construct(
        protected DomainModel|Builder $model
    ) {
    }

    /**
     * Start building a query using the model
     *
     * @return Builder|QueryBuilder
     */
    public function createQuery(): Builder|QueryBuilder
    {
        return $this->model->newQuery();
    }

    /**
     * Generic wrapper to find specific records
     *
     * @param  string|int  $id
     * @param  array  $columns
     * @return DomainModel|null
     */
    public function find(string|int $id, array $columns = ['*']): ?DomainModel
    {
        return $this->model->find($id, $columns);
    }
}