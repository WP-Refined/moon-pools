<?php

namespace App\Domain\Pools\Application\Controllers;

use App\Domain\Pools\Application\Requests\FetchPoolsRequest;
use App\Domain\Pools\Application\Resources\PoolCollection;
use App\Domain\Pools\Infrastructure\Repository\PoolRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;

class PoolController extends Controller
{
    public function __construct(
        private PoolRepository $poolRepository
    ) {
    }

    public function index(FetchPoolsRequest $request): JsonResource
    {
        if ($request->has('favourites')) {
            $pools = $this->poolRepository->favouritePools();
        } else {
            $pools = $this->poolRepository->findPools($request->get('filter'));
        }

        return new PoolCollection($pools);
    }
}
