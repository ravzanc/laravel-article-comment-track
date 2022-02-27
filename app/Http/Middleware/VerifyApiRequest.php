<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class VerifyApiRequest
 * Validate request's given content type and expected content type
 *
 * @package App\Http\Middleware
 */
class VerifyApiRequest
{
    use CommonVerification;

    const JSON_CONTENT_TYPE = 'application/json';

    const METHODS_SUPPORT_CONTENT_TYPE = [
        Request::METHOD_POST,
        Request::METHOD_PUT,
        Request::METHOD_PATCH,
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (in_array($request->method(), self::METHODS_SUPPORT_CONTENT_TYPE)
            && strtolower($request->header('content-type')) != self::JSON_CONTENT_TYPE) {
            return $this->returnBadRequestForInvalidContentType($request, self::JSON_CONTENT_TYPE);
        }

        if (strtolower($request->header('accept')) !=  self::JSON_CONTENT_TYPE) {
            return $this->returnBadRequest(sprintf(
                'Invalid accept given, expected %s, given %s',
                self::JSON_CONTENT_TYPE,
                $request->header('accept')
            ));
        }

        if (in_array(strtoupper($request->getMethod()), self::METHODS_SUPPORT_CONTENT_TYPE)
            && $this->isJsonErrorOccurred($request)) {
            return $this->returnBadRequestWhenJsonErrorOccurred();
        }

        return $next($request);
    }
}
