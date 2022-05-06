<?php

namespace App\Domain\Network\Application\Controllers;

use App\Domain\Network\Application\Requests\FetchNetworkSupplyRequest;
use App\Domain\Network\Application\Resources\NetworkSupplyCollection;
use App\Domain\Network\Infrastructure\Repository\NetworkSupplyRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class NetworkController extends Controller
{
    public function __construct(
        private NetworkSupplyRepository $poolRepository
    ) {
    }

    public function supply(FetchNetworkSupplyRequest $request): JsonResource
    {
        $supply = $this->poolRepository->recentSupply($request->get('limit', 5));

        return new NetworkSupplyCollection($supply);
    }
}
