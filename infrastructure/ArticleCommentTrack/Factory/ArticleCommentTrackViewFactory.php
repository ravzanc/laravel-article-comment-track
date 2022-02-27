<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentTrack\Factory;

use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;
use Lact\ArticleCommentTrack\Domain\Factory\ArticleCommentTrackViewFactoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleCommentTrackViewFactory implements ArticleCommentTrackViewFactoryInterface
{
    public function createView(Article $article): ArticleCommentTrackView
    {
        return new ArticleCommentTrackView(
            $article->getId(),
            $article->getTitle(),
            $article->getComments()->count(),
            $article->getIntents()->count(),
        );
    }
}
