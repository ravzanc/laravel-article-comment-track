<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Provider;

use Illuminate\Support\ServiceProvider;
use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Article\Application\Service\ArticleServiceInterface;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\Article\Domain\Factory\ArticleViewFactoryInterface;
use Lact\Infrastructure\Article\Factory\ArticleViewFactory;
use Lact\Infrastructure\Article\Persistence\Article;
use Lact\Infrastructure\Article\Query\ArticleQuery;
use Lact\Infrastructure\Article\Service\ArticleService;

class ArticleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ArticleServiceInterface::class,
            ArticleService::class
        );

        $this->app->bind(
            ArticleQueryInterface::class,
            ArticleQuery::class
        );

        $this->app->bind(
            ArticleViewFactoryInterface::class,
            ArticleViewFactory::class
        );

        $this->app->bind(
            ArticleModelInterface::class,
            Article::class
        );
    }
}
