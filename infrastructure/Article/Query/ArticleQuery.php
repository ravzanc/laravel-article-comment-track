<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Query;

use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Article\Application\Query\View\ArticleView;
use Lact\Article\Domain\Factory\ArticleViewFactoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleQuery implements ArticleQueryInterface
{
    private ArticleViewFactoryInterface $articleViewFactory;

    public function __construct(ArticleViewFactoryInterface $articleViewFactory)
    {
        $this->articleViewFactory = $articleViewFactory;
    }

    public function getById(int $id): ?ArticleView
    {
        $article = Article::query()->find($id);
        if ($article instanceof Article) {
            return $this->articleViewFactory->createView($article);
        }

        return null;
    }
}
