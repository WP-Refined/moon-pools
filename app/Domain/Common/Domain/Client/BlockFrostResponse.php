<?php

namespace App\Domain\Common\Domain\Client;

use JsonException;
use Psr\Http\Message\ResponseInterface;
use function str_starts_with;

class BlockFrostResponse
{
    private mixed $rawData;

    private bool $successful;

    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->successful = str_starts_with($this->getStatusCode(), 2);
        $this->rawData = $response->getBody()->getContents();
    }

    public function getData(): array
    {
        try {
            return json_decode($this->rawData, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            // TODO: Log exception in error channels
            return [];
        }
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }

    public function isSuccessful(): bool
    {
        return $this->successful;
    }
}
