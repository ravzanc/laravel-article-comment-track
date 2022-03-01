<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleComment\Provider;

use Illuminate\Support\ServiceProvider;
use Lact\ArticleComment\Domain\Model\ArticleCommentModelInterface;
use Lact\ArticleComment\Domain\Repository\ArticleCommentRepositoryInterface;
use Lact\Infrastructure\ArticleComment\Persistence\ArticleComment;
use Lact\Infrastructure\ArticleComment\Repository\ArticleCommentRepository;

class ArticleCommentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ArticleCommentRepositoryInterface::class,
            ArticleCommentRepository::class
        );

        $this->app->bind(
            ArticleCommentModelInterface::class,
            ArticleComment::class
        );
    }
}
