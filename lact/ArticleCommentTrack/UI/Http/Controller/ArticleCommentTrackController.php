<?php

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\UI\Http\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Lact\ArticleCommentTrack\Application\Query\ArticleCommentTrackQueryInterface;
use Lact\ArticleCommentTrack\UI\Http\Resource\ArticleCommentTrackResource;
use Lact\Infrastructure\Http\Response\JsonOkResponse;

class ArticleCommentTrackController extends BaseController
{
    private ArticleCommentTrackQueryInterface $articleCommentTrackQuery;

    public function __construct(ArticleCommentTrackQueryInterface $articleCommentTrackQuery)
    {
        $this->articleCommentTrackQuery = $articleCommentTrackQuery;
    }

    public function getByArticles(): JsonResponse
    {
        $articleCommentTrackViewCollection = $this->articleCommentTrackQuery->getByArticles();

        return new JsonOkResponse(ArticleCommentTrackResource::collection($articleCommentTrackViewCollection));
    }

    public function getBySessions(): JsonResponse
    {
        $articleCommentTrackViewCollection = $this->articleCommentTrackQuery->getBySessions();

        return new JsonOkResponse(ArticleCommentTrackResource::collection($articleCommentTrackViewCollection));
    }
}
