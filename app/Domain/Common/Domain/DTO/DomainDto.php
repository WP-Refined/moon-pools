<?php

namespace App\Domain\Common\Domain\DTO;

abstract class DomainDto
{
    /**
     * Convert the DTO into an array.
     *
     * @return array
     */
    abstract public function toArray(): array;
}