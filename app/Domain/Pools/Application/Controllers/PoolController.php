<?php

namespace App\Domain\Pools\Application\Controllers;

use App\Domain\Common\Application\Response\ApiResponse;
use App\Domains\Pools\Infrastructure\Repository\PoolRepository;
use App\Http\Controllers\Controller;
use App\Domain\Pools\Application\Requests\FetchPoolsRequest;

class PoolController extends Controller
{
    public function __construct(
        private PoolRepository $poolRepository
    ) {
    }

    public function index(FetchPoolsRequest $request): ApiResponse
    {
        $pools = $this->poolRepository->findPools($request->get('filter'));

        return new ApiResponse(
            [
                'pools' => $pools,
            ]
        );
    }
}
