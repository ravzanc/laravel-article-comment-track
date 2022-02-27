<?php

declare(strict_types=1);

namespace Lact\ArticleComment\Domain\Repository;

interface ArticleCommentRepositoryInterface
{
    public function save(int $articleId, string $commentContent): bool;
}
