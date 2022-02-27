<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Lact\Infrastructure\Service\SessionRequestTokenService;

class GenerateSessionFingerPrint
{
    private SessionRequestTokenService $requestTokenService;

    public function __construct(SessionRequestTokenService $requestTokenService)
    {
        $this->requestTokenService = $requestTokenService;
    }

    public function handle(Request $request, Closure $next)
    {
        $sessionId = $this->requestTokenService->generate([
            $this->getRequestRealIp($request),
            $request->getPreferredLanguage(),
            $request->userAgent(),
        ]);

        $request->request->add(['session_id' => $sessionId]);

        return $next($request);
    }

    private function getRequestRealIp(Request $request): string
    {
        $remoteIp = $request->server->get('REMOTE_ADDR');

        if ($request->headers->has('x-forwarded-for')) {
            $request->setTrustedProxies([$remoteIp], Request::HEADER_X_FORWARDED_FOR);
            $clientIps = $request->getClientIps();

            return end($clientIps) ?: $remoteIp;
        }

        return  $remoteIp;
    }
}
