<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

trait CommonVerification
{
    private function isJsonErrorOccurred(Request $request): bool
    {
        json_decode($request->getContent());

        return json_last_error() != JSON_ERROR_NONE;
    }

    private function returnBadRequest(string $errorMessage): JsonResponse
    {
        return response()->json([$errorMessage], Response::HTTP_BAD_REQUEST);
    }

    private function returnBadRequestForInvalidContentType(Request $request, string $expectedContentType): JsonResponse
    {
        return $this->returnBadRequest(sprintf(
            'Invalid content-type given, expected %s, given %s',
            $expectedContentType,
            $request->header('content-type'),
        ));
    }

    private function returnBadRequestWhenJsonErrorOccurred(): JsonResponse
    {
        return $this->returnBadRequest('Request must be json');
    }
}
