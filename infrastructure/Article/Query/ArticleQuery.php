<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Query;

use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Article\Application\Query\View\ArticleView;
use Lact\Infrastructure\Article\Factory\ArticleViewFactory;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleQuery implements ArticleQueryInterface
{
    private ArticleViewFactory$articleViewFactory;

    public function __construct(ArticleViewFactory $articleViewFactory)
    {
        $this->articleViewFactory = $articleViewFactory;
    }

    public function getById(int $id): ?ArticleView
    {
        $article = Article::query()->find($id);
        if ($article instanceof Article) {
            return $this->articleViewFactory->create($article);
        }

        return null;
    }
}
