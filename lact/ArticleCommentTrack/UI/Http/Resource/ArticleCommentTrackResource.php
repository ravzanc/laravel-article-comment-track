<?php

declare(strict_types=1);

namespace Lact\ArticleCommentTrack\UI\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;
use Lact\ArticleCommentTrack\Application\Query\View\ArticleCommentTrackView;

class ArticleCommentTrackResource extends JsonResource
{
    /** @var ArticleCommentTrackView */
    public $resource;

    public function __construct(ArticleCommentTrackView $resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return $this->resource->toArray();
    }
}
