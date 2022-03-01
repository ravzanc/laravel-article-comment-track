<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\Application\Command;

class CreateArticleCommentIntentCommand
{
    private int $articleId;
    private int $commentContentSize;
    private string $sessionId;

    public function __construct(int $articleId, int $commentContentSize, string $sessionId)
    {
        $this->articleId = $articleId;
        $this->commentContentSize = $commentContentSize;
        $this->sessionId = $sessionId;
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getCommentContentSize(): int
    {
        return $this->commentContentSize;
    }

    public function getSessionId(): string
    {
        return $this->sessionId;
    }
}
