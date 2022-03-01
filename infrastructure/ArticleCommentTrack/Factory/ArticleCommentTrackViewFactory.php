<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentTrack\Factory;

use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;
use Lact\ArticleCommentTrack\Domain\Factory\ArticleCommentTrackViewFactoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;
use stdClass;

class ArticleCommentTrackViewFactory implements ArticleCommentTrackViewFactoryInterface
{
    public function createViewFromModel(Article $article): ArticleCommentTrackView
    {
        return new ArticleCommentTrackView(
            $article->getTitle(),
            $article->getAuthor(),
            $article->getComments()->count(),
            $article->getIntents()->count(),
        );
    }

    public function createViewFromObject(StdClass $data): ArticleCommentTrackView
    {
        return new ArticleCommentTrackView(
            $data->id,
            $data->title,
            (int) $data->comments,
            (int) $data->intents,
        );
    }
}
