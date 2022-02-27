<?php

declare(strict_types=1);

namespace  Lact\Article\UI\Http\Controller;

use Lact\Infrastructure\Http\JsonNotFoundResponse;
use Illuminate\Http\JsonResponse;
use Lact\Article\Application\Query\ArticleQueryInterface;
use Lact\Article\Application\Query\View\ArticleView;
use Lact\Infrastructure\Http\JsonOkResponse;

class ArticleController
{
    private ArticleQueryInterface $articleQuery;

    public function __construct(ArticleQueryInterface $articleQuery)
    {
        $this->articleQuery = $articleQuery;
    }

    public function get(int $articleId): JsonResponse
    {
        $articleView = $this->articleQuery->getById($articleId);
        if ($articleView instanceof ArticleView) {
            return new JsonOkResponse($articleView->toArray());
        }

        return new JsonNotFoundResponse('Invalid article');
    }
}
