<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleComment\UI\Http\Request;

use Illuminate\Support\Arr;
use Lact\Infrastructure\Http\Request\SessionRequest;

class SaveArticleCommentRequest extends SessionRequest
{
    public function rules(): array
    {
        return parent::rules() + [
            'article_comment' => 'required|string',
        ];
    }

    public function getArticleCommentContent(): string
    {
        $content = Arr::get($this->validated(), 'article_comment');

        return strip_tags(trim($content));
    }
}
