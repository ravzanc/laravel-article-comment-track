<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Tests\Unit\Lact\Service;

use Lact\Infrastructure\Service\SessionRequestTokenService;
use Tests\TestCase;

class SessionRequestTokenServiceTest extends TestCase
{
    private const TOKEN_LENGTH = 32;

    /**
     * @dataProvider requestData
     */
    public function testGenerateToken(?string $ip, ?string $language,  ?string $agent): void
    {
        $service = app(SessionRequestTokenService::class);

        $token = $service->generate([$ip, $language, $agent]);
        $this->assertEquals(self::TOKEN_LENGTH, strlen($token));
    }

    private function requestData(): array
    {
        return [
            // NULL
            [
                'ip' => null,
                'language' => null,
                'agent' => null,
            ],
            // Empty strings
            [
                'ip' => '',
                'language' => '',
                'agent' => '',
            ],
            // Not-Empty Strings
            [
                'ip' => '127.0.0.1',
                'language' => 'language',
                'agent' => 'agent',
            ],
        ];
    }
}
