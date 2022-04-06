<?php

namespace App\Domain\Pools\Domain\Coordinators;

use App\Domain\Pools\Domain\Client\AdaPoolsClient;
use App\Domains\Pools\Infrastructure\Repository\PoolRepository;
use Illuminate\Database\DatabaseManager;
use RuntimeException;

class PoolCoordinator
{
    public function __construct(
        private PoolRepository $poolRepository,
        private AdaPoolsClient $adaPoolsClient
    ) {
    }

    public function syncPoolsFromNode()
    {
        // TODO: Call ADA Pools endpoint
        $response = $this->adaPoolsClient->get('/pools.json');

        if ($response->isSuccessful()) {
            $pools = $response->getData(); // lazy collection of json
            // $this->poolRepository->updatePools($pools);
        }

        throw new RuntimeException(
            sprintf(
                'Unexpected error while syncing pools: %s',
                $response->getResponse()->getBody()
            )
        );
    }
}
