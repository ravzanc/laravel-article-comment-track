<?php

declare(strict_types=1);

namespace Lact\ArticleComment\Domain\Model;

use Lact\Article\Domain\Model\ArticleModelInterface;

interface ArticleCommentModelInterface
{
    public function getArticle(): ?ArticleModelInterface;

    public function setArticle(?ArticleModelInterface $user): self;

    public function getId(): int;

    public function getContent(): string;
}
