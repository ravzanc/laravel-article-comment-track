<?php

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\UI\Http\Controller;

use Exception;
use Illuminate\Bus\Dispatcher;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;
use Lact\Article\Application\Exception\MissingArticleException;
use Lact\Article\Application\Service\ArticleServiceInterface;
use Lact\ArticleCommentIntent\Application\Command\CreateArticleCommentIntentCommand;
use Lact\ArticleCommentIntent\UI\Http\Request\SaveArticleCommentIntentRequest;
use Lact\Infrastructure\Http\Response\JsonInternalServerErrorResponse;
use Lact\Infrastructure\Http\Response\JsonNotFoundResponse;
use Lact\Infrastructure\Http\Response\JsonOkResponse;

class ArticleCommentIntentController extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    private ArticleServiceInterface $articleService;
    private Dispatcher $dispatcher;

    public function __construct(
        ArticleServiceInterface $articleService,
        Dispatcher$dispatcher
    ) {
        $this->articleService = $articleService;
        $this->dispatcher = $dispatcher;
    }

    public function save(SaveArticleCommentIntentRequest $request, int $articleId): JsonResponse
    {
        try {
            $sessionId = $request->getSessionId();
            $commentContentSize = $request->getArticleCommentSize();

            $command = new CreateArticleCommentIntentCommand(
                $articleId,
                $commentContentSize,
                $sessionId,
            );

            $this->dispatcher->dispatchNow($command);
            return new JsonOkResponse(['success' => true, 'errors' => []]);
        } catch (MissingArticleException $exception) {
            return new JsonNotFoundResponse($exception->getMessage());
        } catch (Exception $exception) {
            return new JsonInternalServerErrorResponse('An error has occurred ... please retry');
        }
    }
}
