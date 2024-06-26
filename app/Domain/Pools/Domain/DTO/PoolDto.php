<?php

namespace App\Domain\Pools\Domain\DTO;

use App\Domain\Common\Domain\DTO\DomainDto;

class PoolDto extends DomainDto
{
    private string $id;

    private string $hex;

    private ?int $retiring_epoch = null;

    private ?int $retired_epoch = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param  string  $id
     * @return PoolDto
     */
    public function setId(string $id): PoolDto
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
     * @return PoolDto
     */
    public function setHex(string $hex): PoolDto
    {
        $this->hex = $hex;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetiringEpoch(): ?int
    {
        return $this->retiring_epoch;
    }

    /**
     * @param  int|null  $retiring_epoch
     * @return PoolDto
     */
    public function setRetiringEpoch(?int $retiring_epoch): PoolDto
    {
        $this->retiring_epoch = $retiring_epoch;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetiredEpoch(): ?int
    {
        return $this->retired_epoch;
    }

    /**
     * @param  int|null  $retired_epoch
     * @return PoolDto
     */
    public function setRetiredEpoch(?int $retired_epoch): PoolDto
    {
        $this->retired_epoch = $retired_epoch;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'hex' => $this->getHex(),
            'retiring_epoch' => $this->getRetiringEpoch(),
            'retired_epoch' => $this->getRetiredEpoch(),
        ];
    }
}