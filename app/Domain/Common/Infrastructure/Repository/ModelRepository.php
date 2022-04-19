<?php

namespace App\Domain\Common\Infrastructure\Repository;

use App\Domain\Common\Infrastructure\Models\DomainModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\QueryException;
use RuntimeException;

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

    /**
     * @param  array|Collection  $poolData
     * @param  string  $uniqueBy
     * @return int
     */
    public function upsert(array|Collection $poolData, string $uniqueBy = 'id'): int
    {
        try {
            return $this->model->upsert(
                !is_array($poolData)
                    ? $poolData->toArray()
                    : $poolData,
                $uniqueBy
            );
        } catch (QueryException $e) {
            if (config('app.env', 'production') === 'local') {
                dd($e->getMessage());
            }

            throw new RuntimeException('Unexpected error occurred while upserting data.');
        }
    }
}