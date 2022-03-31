<?php

namespace App\Domain\Pools\Domain\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class AdaPoolsClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => rtrim(config('pool-gateway.api_url'), '/'),
            'headers' => [
                'Cache-Control' => 'no-cache',
            ],
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function get(string $uri, array $options = []): AdaPoolsResponse
    {
        try {
            $response = $this->client->get($uri, $options);
        } catch (ClientException $e) {
            $response = $e->getResponse();
        }

        return new AdaPoolsResponse($response);
    }
}