<?php /** @author Razvan CORNEA  (2022-03-01) */

namespace Lact\Infrastructure\Http\Response;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonOkResponse extends JsonResponse
{
    public function __construct($data)
    {
        parent::__construct($data, Response::HTTP_OK);
    }
}
