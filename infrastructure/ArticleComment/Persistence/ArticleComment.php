<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\ArticleComment\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\ArticleComment\Domain\Model\ArticleCommentModelInterface;
use Lact\Infrastructure\Article\Persistence\Article;

class ArticleComment extends Model implements ArticleCommentModelInterface
{
    protected $fillable = [
        'content',
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSessionId(): string
    {
        return $this->session_id;
    }
}
