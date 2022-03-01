<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleComment\Domain\Repository;

interface ArticleCommentRepositoryInterface
{
    public function save(int $articleId, string $commentContent, string $sessionId): bool;
}
