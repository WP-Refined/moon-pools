<?php

namespace App\Domain\Pools\Domain\Client;

use Illuminate\Support\LazyCollection;
use Psr\Http\Message\ResponseInterface;

class AdaPoolsResponse
{
    private ?array $data;

    private bool $successful;

    private ResponseInterface $response;

    public function __construct(ResponseInterface $response)
    {
        $raw = $response->getBody()->getContents();

        $this->response = $response;
        $this->successful = str_starts_with($this->getStatusCode(), 2);
        $this->data = LazyCollection::fromJson($raw);
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

    public function isSuccessful(): bool
    {
        return $this->successful;
    }
}