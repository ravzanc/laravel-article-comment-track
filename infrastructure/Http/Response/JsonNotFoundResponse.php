<?php

namespace Lact\Infrastructure\Http\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonNotFoundResponse extends JsonResponse
{
    public function __construct(string $error)
    {
        parent::__construct(['errors' => [$error]], Response::HTTP_NOT_FOUND);
    }
}
