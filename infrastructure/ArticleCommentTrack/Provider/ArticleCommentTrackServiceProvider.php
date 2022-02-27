<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentTrack\Provider;

use Illuminate\Support\ServiceProvider;
use Lact\ArticleCommentTrack\Application\Query\ArticleCommentTrackQueryInterface;
use Lact\ArticleCommentTrack\Domain\Factory\ArticleCommentTrackViewFactoryInterface;
use Lact\Infrastructure\ArticleCommentTrack\Factory\ArticleCommentTrackViewFactory;
use Lact\Infrastructure\ArticleCommentTrack\Query\ArticleCommentTrackQuery;

class ArticleCommentTrackServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ArticleCommentTrackQueryInterface::class,
            ArticleCommentTrackQuery::class
        );

        $this->app->bind(
            ArticleCommentTrackViewFactoryInterface::class,
            ArticleCommentTrackViewFactory::class
        );
    }
}
