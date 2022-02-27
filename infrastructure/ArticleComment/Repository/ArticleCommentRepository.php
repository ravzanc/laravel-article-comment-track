<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleComment\Repository;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Lact\Article\Application\Exception\MissingArticleException;
use Lact\ArticleComment\Domain\Repository\ArticleCommentRepositoryInterface;
use Lact\Infrastructure\Article\Persistence\Article;
use Lact\Infrastructure\ArticleComment\Persistence\ArticleComment;
use RuntimeException;

class ArticleCommentRepository implements ArticleCommentRepositoryInterface
{
    /**
     * @throws ModelNotFoundException|Exception
     */
    public function save(int $articleId, string $commentContent): bool
    {
        DB::beginTransaction();

        try {
            $article = Article::findOrFail($articleId);

            $articleComment = new ArticleComment([
                'content' => $commentContent,
            ]);
            $articleComment->setArticle($article);
            $articleComment->save();

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
