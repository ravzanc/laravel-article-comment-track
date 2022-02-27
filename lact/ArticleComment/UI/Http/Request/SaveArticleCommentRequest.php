<?php

declare(strict_types=1);

namespace Lact\ArticleComment\UI\Http\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class SaveArticleCommentRequest  extends FormRequest
{
    public function rules(): array
    {
        return [
            'article_comment' => 'required|string',
        ];
    }

    public function getArticleCommentContent(): string
    {
        $content = Arr::get($this->validated(), 'article_comment');

        return strip_tags(trim($content));
    }
}
