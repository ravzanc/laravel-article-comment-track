<?php

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleCommentIntent\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\ArticleCommentIntent\Domain\Model\ArticleCommentIntentModelInterface;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleCommentIntent extends Model implements ArticleCommentIntentModelInterface
{
    protected $fillable = [
        'content_size',
        'session_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id');
    }

    public function getArticle(): ?ArticleModelInterface
    {
        return $this->article;
    }

    public function setArticle(?ArticleModelInterface $user): self
    {
        $this->article()->associate($user);

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContentSize(): int
    {
        return $this->content_size;
    }

    public function getSessionId(): string
    {
        return $this->session_id;
    }
}
