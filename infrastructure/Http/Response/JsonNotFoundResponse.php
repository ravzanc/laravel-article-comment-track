<?php /** @author Razvan CORNEA  (2022-03-01) */

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
