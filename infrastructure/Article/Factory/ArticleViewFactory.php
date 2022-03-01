<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Factory;

use Lact\Article\Application\Query\View\ArticleView;
use Lact\Article\Domain\Factory\ArticleViewFactoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleViewFactory implements ArticleViewFactoryInterface
{
    public function createView(Article $article): ArticleView
    {
        return new ArticleView(
            $article->getId(),
            $article->getTitle(),
            $article->getAuthor(),
            $article->getContent(),
        );
    }
}
