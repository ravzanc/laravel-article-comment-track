<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Infrastructure\Article\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Lact\Article\Domain\Model\ArticleModelInterface;
use Lact\Infrastructure\ArticleComment\Persistence\ArticleComment;
use Lact\Infrastructure\ArticleCommentIntent\Persistence\ArticleCommentIntent;

class Article extends Model implements ArticleModelInterface
{
    protected $fillable = [
        'title',
        'author',
        'content',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(ArticleComment::class, 'article_id');
    }

    public function getComments(): ?Collection
    {
        return $this->comments;
    }

    public function intents(): HasMany
    {
        return $this->hasMany(ArticleCommentIntent::class, 'article_id');
    }

    public function getIntents(): ?Collection
    {
        return $this->intents;
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
