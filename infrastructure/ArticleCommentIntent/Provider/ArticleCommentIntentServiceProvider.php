<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentIntent\Provider;

use Illuminate\Support\ServiceProvider;
use Lact\ArticleCommentIntent\Domain\Model\ArticleCommentIntentModelInterface;
use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;
use Lact\Infrastructure\ArticleCommentIntent\Persistence\ArticleCommentIntent;
use Lact\Infrastructure\ArticleCommentIntent\Repository\ArticleCommentIntentRepository;

class ArticleCommentIntentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ArticleCommentIntentRepositoryInterface::class,
            ArticleCommentIntentRepository::class
        );

        $this->app->bind(
            ArticleCommentIntentModelInterface::class,
            ArticleCommentIntent::class
        );
    }
}
