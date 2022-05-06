<?php

namespace App\Domain\Network\Domain\DTO;

use App\Domain\Common\Domain\DTO\DomainDto;

class NetworkSupplyDto extends DomainDto
{
    private int $id;
    
    private int $max_supply;
    
    private int $total_supply;
    
    private int $circulating_supply;
    
    private int $locked_supply;
    
    private int $treasury_supply;
    
    private int $reserve_supply;
    
    private int $live_stake;
    
    private int $active_stake;
    
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     * @return NetworkSupplyDto
     */
    public function setId(int $id): NetworkSupplyDto
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getMaxSupply(): int
    {
        return $this->max_supply;
    }
    
    /**
     * @param int $max_supply
     * @return NetworkSupplyDto
     */
    public function setMaxSupply(int $max_supply): NetworkSupplyDto
    {
        $this->max_supply = $max_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTotalSupply(): int
    {
        return $this->total_supply;
    }
    
    /**
     * @param int $total_supply
     * @return NetworkSupplyDto
     */
    public function setTotalSupply(int $total_supply): NetworkSupplyDto
    {
        $this->total_supply = $total_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCirculatingSupply(): int
    {
        return $this->circulating_supply;
    }
    
    /**
     * @param int $circulating_supply
     * @return NetworkSupplyDto
     */
    public function setCirculatingSupply(int $circulating_supply): NetworkSupplyDto
    {
        $this->circulating_supply = $circulating_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLockedSupply(): int
    {
        return $this->locked_supply;
    }
    
    /**
     * @param int $locked_supply
     * @return NetworkSupplyDto
     */
    public function setLockedSupply(int $locked_supply): NetworkSupplyDto
    {
        $this->locked_supply = $locked_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getTreasurySupply(): int
    {
        return $this->treasury_supply;
    }
    
    /**
     * @param int $treasury_supply
     * @return NetworkSupplyDto
     */
    public function setTreasurySupply(int $treasury_supply): NetworkSupplyDto
    {
        $this->treasury_supply = $treasury_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getReserveSupply(): int
    {
        return $this->reserve_supply;
    }
    
    /**
     * @param int $reserve_supply
     * @return NetworkSupplyDto
     */
    public function setReserveSupply(int $reserve_supply): NetworkSupplyDto
    {
        $this->reserve_supply = $reserve_supply;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getLiveStake(): int
    {
        return $this->live_stake;
    }
    
    /**
     * @param int $live_stake
     * @return NetworkSupplyDto
     */
    public function setLiveStake(int $live_stake): NetworkSupplyDto
    {
        $this->live_stake = $live_stake;
        return $this;
    }
    
    /**
     * @return int
     */
    public function getActiveStake(): int
    {
        return $this->active_stake;
    }
    
    /**
     * @param int $active_stake
     * @return NetworkSupplyDto
     */
    public function setActiveStake(int $active_stake): NetworkSupplyDto
    {
        $this->active_stake = $active_stake;
        return $this;
    }
    
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'max_supply' => $this->getMaxSupply(),
            'total_supply' => $this->getTotalSupply(),
            'circulating_supply' => $this->getCirculatingSupply(),
            'locked_supply' => $this->getLockedSupply(),
            'treasury_supply' => $this->getTreasurySupply(),
            'reserve_supply' => $this->getReserveSupply(),
            'live_stake' => $this->getLiveStake(),
            'active_stake' => $this->getActiveStake(),
        ];
    }
}
