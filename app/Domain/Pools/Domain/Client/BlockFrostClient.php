<?php

namespace App\Domain\Pools\Domain\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class BlockFrostClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => rtrim(config('gateways.blockfrost.api_url'), '/'),
            'headers' => [
                'Cache-Control' => 'no-cache',
                'project_id' => config('gateways.blockfrost.api_key'),
            ],
        ]);
    }

    /**
     * @param  string  $uri
     * @param  array  $options
     * @return BlockFrostResponse
     */
    public function get(string $uri, array $options = []): BlockFrostResponse
    {
        try {
            $response = $this->client->get($uri, $options);
        } catch (GuzzleException|ClientException $e) {
            $response = $e->getResponse();
        }

        return new BlockFrostResponse($response);
    }
}