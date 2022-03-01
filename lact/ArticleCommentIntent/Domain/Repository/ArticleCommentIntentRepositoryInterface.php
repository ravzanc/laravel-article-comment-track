<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\Domain\Repository;

interface ArticleCommentIntentRepositoryInterface
{
    public function save(int $articleId, int $commentContentSize, string $sessionId): bool;
}
