<?php

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\UI\Http\Request;

use Illuminate\Support\Arr;
use Lact\Infrastructure\Http\Request\SessionRequest;

class SaveArticleCommentIntentRequest extends SessionRequest
{
    public function rules(): array
    {
        return parent::rules() + [
            'article_comment_size' => 'required|numeric',
        ];
    }

    public function getArticleCommentSize(): int
    {
        $contentSize = Arr::get($this->validated(), 'article_comment_size');

        return (int) $contentSize;
    }
}
