<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\Article\Domain\Model;

use Illuminate\Support\Collection;

interface ArticleModelInterface
{
    public function getComments(): ?Collection;

    public function getIntents(): ?Collection;

    public function getId(): int;

    public function getTitle(): string;

    public function getAuthor(): string;

    public function getContent(): string;
}
