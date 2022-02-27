<?php

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\UI\Http\Controller;

use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Lact\Article\Application\Exception\MissingArticleException;
use Lact\Article\Application\Service\ArticleServiceInterface;
use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;
use Lact\ArticleCommentIntent\UI\Http\Request\SaveArticleCommentIntentRequest;
use Lact\Infrastructure\Http\Response\JsonInternalServerErrorResponse;
use Lact\Infrastructure\Http\Response\JsonNotFoundResponse;
use Lact\Infrastructure\Http\Response\JsonOkResponse;

class ArticleCommentIntentController extends BaseController
{
    use ValidatesRequests;

    private ArticleServiceInterface $articleService;
    private ArticleCommentIntentRepositoryInterface$articleCommentIntentRepository;

    public function __construct(
        ArticleServiceInterface $articleService,
        ArticleCommentIntentRepositoryInterface$articleCommentIntentRepository
    ) {
        $this->articleService = $articleService;
        $this->articleCommentIntentRepository =  $articleCommentIntentRepository;
    }

    public function save(SaveArticleCommentIntentRequest $request, int $articleId): JsonResponse
    {
        try {
            $sessionId = $request->getSessionId();
            $commentContentSize = $request->getArticleCommentSize();

            if ($this->articleCommentIntentRepository->save($articleId, $commentContentSize, $sessionId)) {
                return new JsonOkResponse(['success' => true, 'errors' => []]);
            }
        } catch (MissingArticleException $exception) {
            return new JsonNotFoundResponse($exception->getMessage());
        }

        return new JsonInternalServerErrorResponse('An error has occurred ... please retry');
    }
}
