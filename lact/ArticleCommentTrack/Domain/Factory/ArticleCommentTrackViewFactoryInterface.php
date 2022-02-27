<?php

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\Domain\Factory;

use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;
use Lact\Infrastructure\Article\Persistence\Article;

interface ArticleCommentTrackViewFactoryInterface
{
    public function createView(Article $article): ArticleCommentTrackView;
}
