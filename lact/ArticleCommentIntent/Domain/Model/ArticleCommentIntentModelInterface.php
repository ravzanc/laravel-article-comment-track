<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\Domain\Model;

use Lact\Article\Domain\Model\ArticleModelInterface;

interface ArticleCommentIntentModelInterface
{
    public function getArticle(): ?ArticleModelInterface;

    public function setArticle(?ArticleModelInterface $user): self;

    public function getId(): int;

    public function getContentSize(): int;

    public function getSessionId(): string;
}
