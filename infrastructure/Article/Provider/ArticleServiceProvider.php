<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Provider;

use Illuminate\Support\ServiceProvider;
use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Infrastructure\Article\Query\ArticleQuery;

class ArticleServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            ArticleQueryInterface::class,
            ArticleQuery::class
        );
    }
}
