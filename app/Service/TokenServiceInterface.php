<?php

declare(strict_types=1);

namespace App\Service;

interface TokenServiceInterface
{
    public function generate(array $data): string;

    public function build(array $data): string;
}
