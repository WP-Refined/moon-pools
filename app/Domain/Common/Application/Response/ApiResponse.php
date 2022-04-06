<?php

namespace App\Domain\Common\Application\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class ApiResponse extends JsonResponse
{
    /**
     * @param  array  $data
     * @param  bool  $successful
     * @param  string  $message
     * @param  int  $statusCode
     */
    public function __construct(array $data, bool $successful = true, string $message = '', int $statusCode = Response::HTTP_OK)
    {
        parent::__construct([
            'data' => $data,
            'success' => $successful,
            'message' => $message,
        ], $statusCode);
    }
}