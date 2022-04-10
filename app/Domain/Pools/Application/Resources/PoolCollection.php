<?php

namespace App\Domain\Pools\Application\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PoolCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = PoolResource::class;
}
