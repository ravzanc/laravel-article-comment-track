<?php

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\Infrastructure\ArticleComment\Persistence\ArticleComment;

class Article extends Model implements ArticleModelInterface
{
    protected $fillable = [
        'title',
        'author',
        'content',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'id');
    }

    public function getComments(): ?Collection
    {
        return $this->comments;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
