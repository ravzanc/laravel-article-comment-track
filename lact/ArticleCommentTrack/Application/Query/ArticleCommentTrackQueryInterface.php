<?php

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\Application\Query;

use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackViewCollection;

interface ArticleCommentTrackQueryInterface
{
    public function getByArticles(): ArticleCommentTrackViewCollection;

    public function getBySessions(): ArticleCommentTrackViewCollection;
}
