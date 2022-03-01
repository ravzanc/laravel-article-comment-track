<?php /** @author Razvan CORNEA  (2022-03-01) */

declare(strict_types=1);

namespace Lact\ArticleCommentIntent\Application\Handler;

use Lact\ArticleCommentIntent\Application\Command\CreateArticleCommentIntentCommand;
use Lact\ArticleCommentIntent\Domain\Repository\ArticleCommentIntentRepositoryInterface;

class CreateArticleCommentIntentHandler
{
    private ArticleCommentIntentRepositoryInterface $articleCommentIntentRepository;

    public function __construct(ArticleCommentIntentRepositoryInterface $articleCommentIntentRepository)
    {
        $this->articleCommentIntentRepository = $articleCommentIntentRepository;
    }

    public function handle(CreateArticleCommentIntentCommand $command): void
    {
        $this->articleCommentIntentRepository->save(
            $command->getArticleId(),
            $command->getCommentContentSize(),
            $command->getSessionId(),
        );
    }
}
