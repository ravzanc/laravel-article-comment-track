<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Tests\Integration\Lact\ArticleCommentIntent;

use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;
use Lact\Infrastructure\ArticleCommentIntent\Persistence\ArticleCommentIntent;
use Lact\Infrastructure\Service\SessionRequestTokenService;
use Mockery;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ArticleCommentIntentTest  extends TestCase
{
    private const ARTICLE_ID = 1;
    private const ARTICLE_COMMENT_SIZE = 99;
    private const REQUEST_TOKEN_KEY = 'test';

    public function testCreateArticleCommentIntent(): void
    {
        $this->mockArticleCommentIntent();

        $service = app(SessionRequestTokenService::class);
        $sessionId = $service->generate([self::REQUEST_TOKEN_KEY]);

        $repository = app(ArticleCommentIntentRepositoryInterface::class);
        $repository->save(self::ARTICLE_ID, self::ARTICLE_COMMENT_SIZE, $sessionId);
    }

    private function mockArticleCommentIntent(): void
    {
        $mock = Mockery::mock('overload:' . ArticleCommentIntent::class);

        $mock
            ->shouldReceive('setArticle')
            ->once();

        $mock
            ->shouldReceive('save')
            ->andReturnTrue()
            ->once();
    }
}
