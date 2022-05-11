<?php

namespace App\Domain\Pools\Application\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PoolDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $conversion = config('gateways.lovelace.conversion', 1000000);
        
        return [
            'id' => $this->id,
            'hex' => $this->hex,
            'name' => $this->name,
            'ticker' => $this->ticker,
            'description' => $this->description,
            'website' => $this->website,
            'ref_url' => $this->ref_url,
            'vrf_key' => $this->vrf_key,
            'blocks_minted' => $this->blocks_minted,
            'blocks_epoch' => $this->blocks_epoch,
            'live_stake' => $this->live_stake / $conversion,
            'live_size' => $this->live_size,
            'live_saturation' => $this->live_saturation,
            'live_delegators' => $this->live_delegators,
            'active_stake' => $this->active_stake / $conversion,
            'active_size' => $this->active_size,
            'declared_pledge' => $this->declared_pledge / $conversion,
            'live_pledge' => $this->live_pledge / $conversion,
            'margin_cost' => $this->margin_cost,
            'fixed_cost' => $this->fixed_cost / $conversion,
            'reward_account' => $this->reward_account,
            'owners' => json_decode($this->owners), // collection/json
            'registration' => json_decode($this->registration), // collection/json
            'retirement' => json_decode($this->retirement), // collection/json
        ];
    }
}
