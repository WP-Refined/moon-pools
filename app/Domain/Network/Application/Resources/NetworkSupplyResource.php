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
        $conversion = config('gateways.lovelace.conversion', 1000000);

        return [
            'id' => $this->id,
            'max_supply' => $this->max_supply / $conversion,
            'total_supply' => $this->total_supply / $conversion,
            'circulating_supply' => $this->circulating_supply / $conversion,
            'locked_supply' => $this->locked_supply / $conversion,
            'treasury_supply' => $this->treasury_supply / $conversion,
            'reserve_supply' => $this->reserve_supply / $conversion,
            'live_stake' => $this->live_stake / $conversion,
            'active_stake' => $this->active_stake / $conversion,
            'record_date' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}
