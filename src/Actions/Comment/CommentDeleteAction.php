<?php

declare(strict_types=1);

namespace Planka\Bridge\Actions\Comment;

use Planka\Bridge\Contracts\Actions\ResponseResultInterface;
use Planka\Bridge\Contracts\Actions\AuthenticateInterface;
use Planka\Bridge\Contracts\Actions\ActionInterface;
use Planka\Bridge\Traits\CommentHydrateTrait;
use Planka\Bridge\Traits\AuthenticateTrait;

final class CommentDeleteAction implements ActionInterface, AuthenticateInterface, ResponseResultInterface
{
    use AuthenticateTrait, CommentHydrateTrait;

    public function __construct(
        string $token,
        private readonly string $commentId
    ) {
        $this->setToken($token);
    }

    public function url(): string
    {
        return "api/comment-actions/{$this->commentId}";
    }

    public function getOptions(): array
    {
        return [];
    }
}