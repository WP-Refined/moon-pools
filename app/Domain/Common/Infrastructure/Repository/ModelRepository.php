<?php

namespace App\Domain\Common\Infrastructure;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class ModelRepository
{
    public function __construct(
        protected Model|Builder $model
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
     * @return Model|null
     */
    public function find(string|int $id, array $columns = ['*']): ?Model
    {
        return $this->model->find($id, $columns);
    }
}