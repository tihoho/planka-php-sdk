<?php

declare(strict_types=1);

namespace Planka\Bridge\Actions\Label;

use Planka\Bridge\Contracts\Actions\ResponseResultInterface;
use Planka\Bridge\Contracts\Actions\AuthenticateInterface;
use Planka\Bridge\Contracts\Actions\ActionInterface;
use Planka\Bridge\Traits\AuthenticateTrait;
use Planka\Bridge\Traits\LabelHydrateTrait;
use Planka\Bridge\Enum\LabelColorEnum;

final class LabelUpdateAction implements ActionInterface, AuthenticateInterface, ResponseResultInterface
{
    use AuthenticateTrait, LabelHydrateTrait;

    public function __construct(
        string $token,
        private readonly string $labelId,
        private readonly string $name,
        private readonly LabelColorEnum $color
    ) {
        $this->setToken($token);
    }

    public function url(): string
    {
        return "api/labels/{$this->labelId}";
    }

    public function getOptions(): array
    {
        return [
            'body' => [
                'name' => $this->name,
                'color' => $this->color->value,
            ],
        ];
    }
}