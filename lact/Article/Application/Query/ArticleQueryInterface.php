<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Article\Application\Query;

use Lact\Article\Application\Query\View\ArticleView;

interface ArticleQueryInterface
{
    public function getById(int $id):  ?ArticleView;
}
