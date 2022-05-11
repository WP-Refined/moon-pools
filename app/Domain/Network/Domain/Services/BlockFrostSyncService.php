<?php

namespace App\Domain\Network\Domain\Services;

use App\Domain\Common\Domain\Client\BlockFrostClient;
use App\Domain\Network\Domain\DTO\NetworkSupplyDto;
use App\Domain\Network\Infrastructure\Repository\NetworkSupplyRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use RuntimeException;

class BlockFrostSyncService
{
    public function __construct(
        private BlockFrostClient $blockFrostClient,
        private NetworkSupplyRepository $networkSupplyRepository
    ) {
    }

    public function retrieveNetworkSupply(): NetworkSupplyDto
    {
        $response = $this->blockFrostClient->get('network');
        if (!$response->isSuccessful()) {
            throw new RuntimeException(
                sprintf(
                    'Unexpected error while syncing network details: %s',
                    json_encode($response->getResponse()->getBody())
                )
            );
        }

        $data = $response->getData();

        return (new NetworkSupplyDto())
            ->setMaxSupply(Arr::get($data, 'supply.max'))
            ->setTotalSupply(Arr::get($data, 'supply.total'))
            ->setCirculatingSupply(Arr::get($data, 'supply.circulating'))
            ->setLockedSupply(Arr::get($data, 'supply.locked'))
            ->setTreasurySupply(Arr::get($data, 'supply.treasury'))
            ->setReserveSupply(Arr::get($data, 'supply.reserves'))
            ->setLiveStake(Arr::get($data, 'stake.live'))
            ->setActiveStake(Arr::get($data, 'stake.active'))
            ->setRecordDate(Carbon::now());
    }

    public function persistNetworkSupply(NetworkSupplyDto $networkSupply): bool
    {
        $hasExistingRecord = $this->networkSupplyRepository
            ->createQuery()
            ->where(
                'record_date',
                $networkSupply->getRecordDate()->format('Y-m-d')
            )
            ->exists();

        if (!$hasExistingRecord) {
            return $this->networkSupplyRepository
                ->createQuery()
                ->insert($networkSupply->toArray());
        }

        return false;
    }
}
