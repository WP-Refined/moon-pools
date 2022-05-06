<?php

namespace App\Domain\Network\Application\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NetworkSupplyCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = NetworkSupplyResource::class;
}
