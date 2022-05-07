<?php

namespace App\Domain\Network\Application\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NetworkSupplyResource extends JsonResource
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
            'max_supply' => $this->max_supply,
            'total_supply' => $this->total_supply,
            'circulating_supply' => $this->circulating_supply,
            'locked_supply' => $this->locked_supply,
            'treasury_supply' => $this->treasury_supply,
            'reserve_supply' => $this->reserve_supply,
            'live_stake' => $this->live_stake,
            'active_stake' => $this->active_stake,
            'record_date' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
