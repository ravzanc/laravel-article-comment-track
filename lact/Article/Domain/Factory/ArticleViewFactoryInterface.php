<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Article\Domain\Factory;

use Lact\Article\Application\Query\View\ArticleView;
use Lact\Infrastructure\Article\Persistence\Article;

interface ArticleViewFactoryInterface
{
    public function createView(Article $article): ArticleView;
}
