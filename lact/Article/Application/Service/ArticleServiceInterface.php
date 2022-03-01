<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Article\Application\Service;

use Lact\Article\Application\Query\View\ArticleView;

interface ArticleServiceInterface
{
    public function getDefaultArticle(): ArticleView;
}
