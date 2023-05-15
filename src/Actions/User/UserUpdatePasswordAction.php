<?php

declare(strict_types=1);

namespace Planka\Bridge\Actions\User;

use Planka\Bridge\Contracts\Actions\ResponseResultInterface;
use Planka\Bridge\Contracts\Actions\AuthenticateInterface;
use Planka\Bridge\Contracts\Actions\ActionInterface;
use Planka\Bridge\Traits\AuthenticateTrait;
use Planka\Bridge\Traits\UserHydrateTrait;

final class UserUpdatePasswordAction implements ActionInterface, AuthenticateInterface, ResponseResultInterface
{
    use AuthenticateTrait, UserHydrateTrait;

    public function __construct(
        private readonly string $userId,
        private readonly string $current,
        private readonly string $new,
        string $token
    ) {
        $this->setToken($token);
    }

    public function url(): string
    {
        return "api/users/{$this->userId}/password";
    }

    public function getOptions(): array
    {
        return [
            'body' => [
                'currentPassword' => $this->current,
                'password' => $this->new,
            ],
        ];
    }
}