<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Article\Application\Query\View;

class ArticleView
{
    private int $id;
    private string $title;
    private string $author;
    private string $content;

    public function __construct(int $id, string $title, string $author, string $content)
    {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->content = $content;
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

    public function toArray(): array
    {
        return [
            'title' => $this->getTitle(),
            'author' => $this->getAuthor(),
            'content' => $this->getContent(),
        ];
    }
}
