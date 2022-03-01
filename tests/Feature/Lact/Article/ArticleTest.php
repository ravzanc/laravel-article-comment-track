<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Tests\Feature\Lact\Article;

use Illuminate\Http\Request;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    private const INEXISTENT_ARTICLE = 999;
    private const EXISTENT_ARTICLE = 1;

    public function testGetInexistentArticle(): void
    {
        $response = $this->json(
            Request::METHOD_GET,
            sprintf('api/article/%d', self::INEXISTENT_ARTICLE),
        );

        $response->assertNotFound();
    }

    public function testGetExistentArticle(): void
    {
        $response = $this->json(
            Request::METHOD_GET,
            sprintf('api/article/%d', self::EXISTENT_ARTICLE),
        );

        $response->assertOk();
        $response->assertJsonStructure([
            'title',
            'author',
            'content'
        ]);
    }
}
