<?php

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\Domain\Factory;

use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;
use Lact\Infrastructure\Article\Persistence\Article;
use stdClass;

interface ArticleCommentTrackViewFactoryInterface
{
    public function createViewFromModel(Article $article): ArticleCommentTrackView;

    public function createViewFromObject(StdClass $data): ArticleCommentTrackView;
}
