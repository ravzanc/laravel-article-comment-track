<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Service;

use App\Service\TokenServiceInterface;

class SessionRequestTokenService implements TokenServiceInterface
{
    public function generate(array $data): string
    {
        $key = $this->build($data);

        return md5($key);
    }

    public function build(array $data): string
    {
        $key = implode(
            config('lact.session_id_delimiter'),
            $data
        );

        if (strlen($key) < 10) {
            $key .= microtime();
        }

        return $key;
    }
}
