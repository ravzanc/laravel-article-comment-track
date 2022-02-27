<?php

declare(strict_types=1);

namespace Lact\Article\Application\Query;

use Lact\Article\Application\Query\View\ArticleView;

interface ArticleQueryInterface
{
    public function getById(int $id):  ?ArticleView;
}
