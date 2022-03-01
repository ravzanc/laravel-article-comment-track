<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Tests\Feature\Lact\ArticleCommentTrack;

use Illuminate\Http\Request;
use Tests\TestCase;

class ArticleCommentTrackTest extends TestCase
{
    public function testTrackByArticles(): void
    {
         $response = $this->json(
             Request::METHOD_GET,
             'api/article/comment/track',
         );

         $response->assertOk();
         $response->assertJsonStructure([
             [
                 'id',
                 'name',
                 'comments',
                 'intents',
            ]
         ]);
    }

    public function testTrackBySessions(): void
    {
        $response = $this->json(
            Request::METHOD_GET,
            'api/article/comment/track/session',
        );

        $response->assertOk();
        $response->assertJsonStructure([
            [
                'id',
                'name',
                'comments',
                'intents',
            ]
        ]);
    }
}
