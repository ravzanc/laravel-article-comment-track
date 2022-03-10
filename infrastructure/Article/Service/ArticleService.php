<?php /** @author Razvan CORNEA  (2022-03-01) */

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

    public function getDefaultArticleView(): ArticleView
    {
        $articleId = config('lact.default_article_id');

        return $this->articleQuery->getById($articleId);
    }
}
