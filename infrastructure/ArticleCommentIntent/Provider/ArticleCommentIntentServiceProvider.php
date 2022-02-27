<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentIntent\Provider;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\ServiceProvider;
use Lact\ArticleCommentIntent\Application\Command\CreateArticleCommentIntentCommand;
use Lact\ArticleCommentIntent\Application\Handler\CreateArticleCommentIntentHandler;
use Lact\ArticleCommentIntent\Domain\Model\ArticleCommentIntentModelInterface;
use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;
use Lact\Infrastructure\ArticleCommentIntent\Persistence\ArticleCommentIntent;
use Lact\Infrastructure\ArticleCommentIntent\Repository\ArticleCommentIntentRepository;

class ArticleCommentIntentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app->extend(Dispatcher::class, static function (Dispatcher $service) {
            $service->map([
                CreateArticleCommentIntentCommand::class => CreateArticleCommentIntentHandler::class,
            ]);

            return $service;
        });
    }

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
