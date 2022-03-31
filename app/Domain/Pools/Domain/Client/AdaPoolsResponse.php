<?php

namespace App\Domain\Pools\Domain\Client;

use Illuminate\Support\LazyCollection;
use Psr\Http\Message\ResponseInterface;

class AdaPoolsResponse
{
    private bool $isSuccess;

    private ?array $data;

    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $raw = $response->getBody()->getContents();

        $this->response = $response;
        $this->isSuccess = str_starts_with($this->getStatusCode(), 2);
        $this->data = LazyCollection::fromJson($raw);
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function getData(): ?array
    {
        return $this->data;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getStatusCode(): int
    {
        return $this->response->getStatusCode();
    }
}