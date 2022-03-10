<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleComment\Domain\Model;

use Lact\Article\Domain\Model\ArticleModelInterface;

interface ArticleCommentModelInterface
{
    public function getArticle(): ?ArticleModelInterface;

    public function setArticle(?ArticleModelInterface $article): self;

    public function getId(): int;

    public function getContent(): string;

    public function getSessionId(): string;
}
