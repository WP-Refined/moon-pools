<?php

namespace App\Domain\Common\Domain\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use function config;

class BlockFrostClient
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => rtrim(config('gateways.blockfrost.api_url'), '/').'/',
            'headers' => [
                'Content-Type' => 'application/json',
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
            $response = $this->client->get(ltrim($uri, '/'), $options);
        } catch (GuzzleException|ClientException $e) {
            $response = $e->getResponse();
        }

        return new BlockFrostResponse($response);
    }
}
