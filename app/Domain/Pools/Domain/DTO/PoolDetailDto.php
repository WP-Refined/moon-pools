<?php

namespace App\Domain\Pools\Domain\DTO;

use App\Domain\Common\Domain\DTO\DomainDto;

class PoolDetailDto extends DomainDto
{
    private string $id;

    private string $hex;

    private ?string $name = null;

    private ?string $ticker = null;

    private ?string $description = null;

    private ?string $website = null;

    private ?string $ref_url = null;

    private ?string $ref_hash = null;

    private string $vrf_key;

    private int $blocks_minted;

    private int $blocks_epoch;

    private string $live_stake;

    private float $live_size;

    private float $live_saturation;

    private float $live_delegators;

    private string $active_stake;

    private float $active_size;

    private string $declared_pledge;

    private string $live_pledge;

    private float $margin_cost;

    private string $fixed_cost;

    private string $reward_account;

    private array $owners = [];

    private array $registration = [];

    private array $retirement = [];

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string  $id
     * @return PoolDetailDto
     */
    public function setId(string $id): PoolDetailDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getHex(): string
    {
        return $this->hex;
    }

    /**
     * @param  string  $hex
     * @return PoolDetailDto
     */
    public function setHex(string $hex): PoolDetailDto
    {
        $this->hex = $hex;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     * @return PoolDetailDto
     */
    public function setName(string $name): PoolDetailDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTicker(): ?string
    {
        return $this->ticker;
    }

    /**
     * @param  string  $ticker
     * @return PoolDetailDto
     */
    public function setTicker(string $ticker): PoolDetailDto
    {
        $this->ticker = $ticker;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param  string  $description
     * @return PoolDetailDto
     */
    public function setDescription(string $description): PoolDetailDto
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebsite(): ?string
    {
        return $this->website;
    }

    /**
     * @param  string  $website
     * @return PoolDetailDto
     */
    public function setWebsite(string $website): PoolDetailDto
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefUrl(): ?string
    {
        return $this->ref_url;
    }

    /**
     * @param  string  $ref_url
     * @return PoolDetailDto
     */
    public function setRefUrl(string $ref_url): PoolDetailDto
    {
        $this->ref_url = $ref_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefHash(): ?string
    {
        return $this->ref_hash;
    }

    /**
     * @param  string  $ref_hash
     * @return PoolDetailDto
     */
    public function setRefHash(string $ref_hash): PoolDetailDto
    {
        $this->ref_hash = $ref_hash;
        return $this;
    }

    /**
     * @return string
     */
    public function getVrfKey(): string
    {
        return $this->vrf_key;
    }

    /**
     * @param  string  $vrf_key
     * @return PoolDetailDto
     */
    public function setVrfKey(string $vrf_key): PoolDetailDto
    {
        $this->vrf_key = $vrf_key;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlocksMinted(): int
    {
        return $this->blocks_minted;
    }

    /**
     * @param  int  $blocks_minted
     * @return PoolDetailDto
     */
    public function setBlocksMinted(int $blocks_minted): PoolDetailDto
    {
        $this->blocks_minted = $blocks_minted;
        return $this;
    }

    /**
     * @return int
     */
    public function getBlocksEpoch(): int
    {
        return $this->blocks_epoch;
    }

    /**
     * @param  int  $blocks_epoch
     * @return PoolDetailDto
     */
    public function setBlocksEpoch(int $blocks_epoch): PoolDetailDto
    {
        $this->blocks_epoch = $blocks_epoch;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiveStake(): string
    {
        return $this->live_stake;
    }

    /**
     * @param  string  $live_stake
     * @return PoolDetailDto
     */
    public function setLiveStake(string $live_stake): PoolDetailDto
    {
        $this->live_stake = $live_stake;
        return $this;
    }

    /**
     * @return float
     */
    public function getLiveSize(): float
    {
        return $this->live_size;
    }

    /**
     * @param  float  $live_size
     * @return PoolDetailDto
     */
    public function setLiveSize(float $live_size): PoolDetailDto
    {
        $this->live_size = $live_size;
        return $this;
    }

    /**
     * @return float
     */
    public function getLiveSaturation(): float
    {
        return $this->live_saturation;
    }

    /**
     * @param  float  $live_saturation
     * @return PoolDetailDto
     */
    public function setLiveSaturation(float $live_saturation): PoolDetailDto
    {
        $this->live_saturation = $live_saturation;
        return $this;
    }

    /**
     * @return float
     */
    public function getLiveDelegators(): float
    {
        return $this->live_delegators;
    }

    /**
     * @param  float  $live_delegators
     * @return PoolDetailDto
     */
    public function setLiveDelegators(float $live_delegators): PoolDetailDto
    {
        $this->live_delegators = $live_delegators;
        return $this;
    }

    /**
     * @return string
     */
    public function getActiveStake(): string
    {
        return $this->active_stake;
    }

    /**
     * @param  string  $active_stake
     * @return PoolDetailDto
     */
    public function setActiveStake(string $active_stake): PoolDetailDto
    {
        $this->active_stake = $active_stake;
        return $this;
    }

    /**
     * @return float
     */
    public function getActiveSize(): float
    {
        return $this->active_size;
    }

    /**
     * @param  float  $active_size
     * @return PoolDetailDto
     */
    public function setActiveSize(float $active_size): PoolDetailDto
    {
        $this->active_size = $active_size;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeclaredPledge(): string
    {
        return $this->declared_pledge;
    }

    /**
     * @param  string  $declared_pledge
     * @return PoolDetailDto
     */
    public function setDeclaredPledge(string $declared_pledge): PoolDetailDto
    {
        $this->declared_pledge = $declared_pledge;
        return $this;
    }

    /**
     * @return string
     */
    public function getLivePledge(): string
    {
        return $this->live_pledge;
    }

    /**
     * @param  string  $live_pledge
     * @return PoolDetailDto
     */
    public function setLivePledge(string $live_pledge): PoolDetailDto
    {
        $this->live_pledge = $live_pledge;
        return $this;
    }

    /**
     * @return float
     */
    public function getMarginCost(): float
    {
        return $this->margin_cost;
    }

    /**
     * @param  float  $margin_cost
     * @return PoolDetailDto
     */
    public function setMarginCost(float $margin_cost): PoolDetailDto
    {
        $this->margin_cost = $margin_cost;
        return $this;
    }

    /**
     * @return string
     */
    public function getFixedCost(): string
    {
        return $this->fixed_cost;
    }

    /**
     * @param  string  $fixed_cost
     * @return PoolDetailDto
     */
    public function setFixedCost(string $fixed_cost): PoolDetailDto
    {
        $this->fixed_cost = $fixed_cost;
        return $this;
    }

    /**
     * @return string
     */
    public function getRewardAccount(): string
    {
        return $this->reward_account;
    }

    /**
     * @param  string  $reward_account
     * @return PoolDetailDto
     */
    public function setRewardAccount(string $reward_account): PoolDetailDto
    {
        $this->reward_account = $reward_account;
        return $this;
    }

    /**
     * @return array
     */
    public function getOwners(): array
    {
        return $this->owners;
    }

    /**
     * @param  array  $owners
     * @return PoolDetailDto
     */
    public function setOwners(array $owners): PoolDetailDto
    {
        $this->owners = $owners;
        return $this;
    }

    /**
     * @return array
     */
    public function getRegistration(): array
    {
        return $this->registration;
    }

    /**
     * @param  array  $registration
     * @return PoolDetailDto
     */
    public function setRegistration(array $registration): PoolDetailDto
    {
        $this->registration = $registration;
        return $this;
    }

    /**
     * @return array
     */
    public function getRetirement(): array
    {
        return $this->retirement;
    }

    /**
     * @param  array  $retirement
     * @return PoolDetailDto
     */
    public function setRetirement(array $retirement): PoolDetailDto
    {
        $this->retirement = $retirement;
        return $this;
    }

    /**
     * @param  bool  $serialiseMeta  Serialise fields that will be stored as json.
     * @return array
     */
    public function toArray(bool $serialiseMeta = false): array
    {
        return [
            'id' => $this->id,
            'hex' => $this->hex,
            'name' => $this->name,
            'ticker' => $this->ticker,
            'description' => $this->description,
            'website' => $this->website,
            'ref_url' => $this->ref_url,
            'ref_hash' => $this->ref_hash,
            'vrf_key' => $this->vrf_key,
            'blocks_minted' => $this->blocks_minted,
            'blocks_epoch' => $this->blocks_epoch,
            'live_stake' => $this->live_stake,
            'live_size' => $this->live_size,
            'live_saturation' => $this->live_saturation,
            'live_delegators' => $this->live_delegators,
            'active_stake' => $this->active_stake,
            'active_size' => $this->active_size,
            'declared_pledge' => $this->declared_pledge,
            'live_pledge' => $this->live_pledge,
            'margin_cost' => $this->margin_cost,
            'fixed_cost' => $this->fixed_cost,
            'reward_account' => $this->reward_account,
            'owners' => $serialiseMeta
                ? json_encode($this->owners)
                : $this->owners,
            'registration' => $serialiseMeta
                ? json_encode($this->registration)
                : $this->registration,
            'retirement' => $serialiseMeta
                ? json_encode($this->retirement)
                : $this->retirement,
        ];
    }

    /**
     * Pool data only array (e.g. staking & block stats)
     *
     * @param  bool  $serialiseMeta  Serialise fields that will be stored as json.
     * @return array
     */
    public function toPoolArray(bool $serialiseMeta = false): array
    {
        return array_filter($this->toArray($serialiseMeta), function ($key) {
            return !in_array($key, [
                'name' => $this->name,
                'ticker' => $this->ticker,
                'description' => $this->description,
                'website' => $this->website,
                'ref_url' => $this->ref_url,
                'ref_hash' => $this->ref_hash,
            ]);
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * Meta data only array
     *
     * @return array
     */
    public function toMetaArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'ticker' => $this->ticker,
            'description' => $this->description,
            'website' => $this->website,
            'ref_url' => $this->ref_url,
            'ref_hash' => $this->ref_hash,
        ];
    }
}