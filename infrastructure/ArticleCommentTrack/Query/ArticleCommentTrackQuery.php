<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentTrack\Query;

use Illuminate\Database\Eloquent\Builder;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\ArticleCommentTrack\Application\Query\ArticleCommentTrackQueryInterface;
use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;
use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackViewCollection;
use Lact\Infrastructure\Article\Persistence\Article;
use Lact\Infrastructure\ArticleCommentTrack\Factory\ArticleCommentTrackViewFactory;

class ArticleCommentTrackQuery implements ArticleCommentTrackQueryInterface
{
    private ArticleCommentTrackViewFactory $articleCommentTrackViewFactory;

    public function __construct(ArticleCommentTrackViewFactory $articleCommentTrackViewFactory)
    {
        $this->articleCommentTrackViewFactory = $articleCommentTrackViewFactory;
    }

    public function getByArticles(): ArticleCommentTrackViewCollection
    {
        $collection = new ArticleCommentTrackViewCollection();

        $articles = $this->getBaseQuery()->get();
        /** @var ArticleModelInterface $article */
        foreach ($articles as $article) {
            $collection->add(
                $this->articleCommentTrackViewFactory->createView($article)
            );
        }

        return $collection;
    }

    public function getBySessions(): ArticleCommentTrackViewCollection
    {
        $collection = new ArticleCommentTrackViewCollection();

        $articles = $this->getBaseQuery()->get();
        /** @var ArticleModelInterface $article */
        foreach ($articles as $article) {
            $collection->add(
                $this->articleCommentTrackViewFactory->createView($article)
            );
        }

        return $collection;
    }

    private function getBaseQuery(): Builder
    {
        return Article::query()
            ->with(['comments', 'intents']);
    }
}
