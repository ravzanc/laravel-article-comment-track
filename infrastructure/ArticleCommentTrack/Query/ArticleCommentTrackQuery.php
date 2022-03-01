<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentTrack\Query;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\ArticleCommentTrack\Application\Query\ArticleCommentTrackQueryInterface;
use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackViewCollection;
use Lact\Infrastructure\Article\Persistence\Article;
use Lact\Infrastructure\ArticleCommentTrack\Factory\ArticleCommentTrackViewFactory;
use stdClass;

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
                $this->articleCommentTrackViewFactory->createViewFromModel($article)
            );
        }

        return $collection;
    }

    public function getBySessions(): ArticleCommentTrackViewCollection
    {
        $collection = new ArticleCommentTrackViewCollection();

        $query = 'select session_id as id, title, sum(comments) as comments, sum(intents) as intents from (
                	(select session_id, a.title, count(*) as comments, 0 as intents from article_comments ac
                    left join articles a on ac.article_id = a.id
                    group by 1,2)
                    UNION ALL
                    (select session_id, a.title, 0 as comments, count(*) as intents from article_comment_intents aci
                    left join articles a on aci.article_id = a.id
                    group by 1,2)
                ) a
                group by 1,2';

        $articles = DB::select($query);

        /** @var StdClass $article */
        foreach ($articles as $article) {
            $collection->add(
                $this->articleCommentTrackViewFactory->createViewFromObject($article)
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
