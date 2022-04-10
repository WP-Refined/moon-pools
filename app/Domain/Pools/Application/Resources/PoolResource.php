<?php

namespace App\Domain\Pools\Application\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pool_hex' => $this->pool_hex,
            'retiring_epoch' => $this->retiring_epoch,
            'retired_epoch' => $this->retired_epoch,
            'detail' => $this->whenLoaded('detail', new PoolDetailResource($this->detail)),
            'created_at' => null,
            'updated_at' => null,
        ];
    }
}
