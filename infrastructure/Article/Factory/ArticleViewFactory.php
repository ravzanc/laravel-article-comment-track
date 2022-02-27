<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Factory;

use Lact\Article\Application\Query\View\ArticleView;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleViewFactory
{
    public function create(Article $article): ArticleView
    {
        return new ArticleView(
            $article->getId(),
            $article->getTitle(),
            $article->getAuthor(),
            $article->getContent(),
        );
    }
}
