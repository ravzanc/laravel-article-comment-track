<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentIntent\Repository;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Lact\Article\Application\Exception\MissingArticleException;
use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;
use Lact\Infrastructure\ArticleCommentIntent\Persistence\ArticleCommentIntent;

class ArticleCommentIntentRepository implements ArticleCommentIntentRepositoryInterface
{
    /**
     * @throws ModelNotFoundException|Exception
     */
    public function save(int $articleId, int $commentContentSize, string $sessionId): bool
    {
        DB::beginTransaction();

        try {
            $article = Article::findOrFail($articleId);

            $articleCommentIntent = new ArticleCommentIntent([
                'content_size' => $commentContentSize,
                'session_id' => $sessionId,
            ]);
            $articleCommentIntent->setArticle($article);
            $articleCommentIntent->save();

            DB::commit();
        } catch (ModelNotFoundException $exception) {
            DB::rollBack();
            throw new MissingArticleException(sprintf(
                'Missing article to post a comment for id: %d.',
                $articleId
            ));
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return true;
    }
}
