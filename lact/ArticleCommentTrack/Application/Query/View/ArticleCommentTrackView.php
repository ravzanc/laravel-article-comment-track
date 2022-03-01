<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\Application\Query\View;

class ArticleCommentTrackView
{
    private string $id;
    private string $name;
    private int $comments;
    private int $intents;

    public function __construct(string $id, string $name, int $comments, int $intents)
    {
        $this->id = $id;
        $this->name = $name;
        $this->comments = $comments;
        $this->intents = $intents;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getComments(): int
    {
        return $this->comments;
    }

    public function getIntents(): int
    {
        return $this->intents;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'comments' => $this->getComments(),
            'intents' => $this->getIntents(),
        ];
    }
}
