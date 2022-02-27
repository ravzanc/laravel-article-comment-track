<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Service;

use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Article\Application\Query\View\ArticleView;
use Lact\Article\Application\Service\ArticleServiceInterface;

class ArticleService implements ArticleServiceInterface
{
    private ArticleQueryInterface$articleQuery;

    public function __construct(ArticleQueryInterface $articleQuery)
    {
        $this->articleQuery = $articleQuery;
    }

    public function getDefaultArticle(): ArticleView
    {
        $articleId = config('lact.default_article_id');

        return $this->articleQuery->getById($articleId);
    }
}
