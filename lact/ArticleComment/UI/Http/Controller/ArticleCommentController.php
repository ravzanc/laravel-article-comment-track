<?php

declare(strict_types=1);

namespace Lact\ArticleComment\UI\Http\Controller;

use Exception;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use Lact\Article\Application\Exception\MissingArticleException;
use Lact\Article\Application\Service\ArticleServiceInterface;
use Lact\ArticleComment\Domain\Repository\ArticleCommentRepositoryInterface;
use Lact\ArticleComment\UI\Http\Request\SaveArticleCommentRequest;
use Lact\Infrastructure\Http\JsonInternalServerErrorResponse;
use Lact\Infrastructure\Http\JsonNotFoundResponse;
use Lact\Infrastructure\Http\JsonOkResponse;

class ArticleCommentController extends BaseController
{
    use ValidatesRequests;

    private ArticleServiceInterface $articleService;
    private ArticleCommentRepositoryInterface$articleCommentRepository;

    public function __construct(
        ArticleServiceInterface $articleService,
        ArticleCommentRepositoryInterface$articleCommentRepository
    ) {
        $this->articleService = $articleService;
        $this->articleCommentRepository =  $articleCommentRepository;
    }

    public function index(): View
    {
        $articleView = $this->articleService->getDefaultArticle();

        return view('lact/article_comment', [
            'errors' => [],
            'articleId' => $articleView->getId(),
            'article' => $articleView->toArray(),
            'articleComment' => '',
        ]);
    }

    public function save(SaveArticleCommentRequest $request, int $articleId): JsonResponse
    {
        try {
            $commentContent = $request->getArticleCommentContent();

            if ($this->articleCommentRepository->save($articleId, $commentContent)) {
                return new JsonOkResponse(['success' => true, 'errors' => []]);
            }
        } catch (MissingArticleException $exception) {
            return new JsonNotFoundResponse($exception->getMessage());
        }

        return new JsonInternalServerErrorResponse('An error has occurred ... please retry');
    }
}
