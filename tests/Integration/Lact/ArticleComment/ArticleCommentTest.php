<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Tests\Integration\Lact\ArticleComment;

use Lact\ArticleComment\Domain\Repository\ArticleCommentRepositoryInterface;
use Lact\Infrastructure\ArticleComment\Persistence\ArticleComment;
use Lact\Infrastructure\Service\SessionRequestTokenService;
use Mockery;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class ArticleCommentTest  extends TestCase
{
    private const ARTICLE_ID = 1;
    private const ARTICLE_COMMENT = 'Test article comment';
    private const REQUEST_TOKEN_KEY = 'test';

    public function testCreateArticleComment(): void
    {
        $this->mockArticleComment();

        $service = app(SessionRequestTokenService::class);
        $sessionId = $service->generate([self::REQUEST_TOKEN_KEY]);

        $repository = app(ArticleCommentRepositoryInterface::class);
        $repository->save(self::ARTICLE_ID, self::ARTICLE_COMMENT, $sessionId);
    }

    private function mockArticleComment(): void
    {
        $mock = Mockery::mock('overload:' . ArticleComment::class);

        $mock
            ->shouldReceive('setArticle')
            ->once();

        $mock
            ->shouldReceive('save')
            ->andReturnTrue()
            ->once();
    }
}
