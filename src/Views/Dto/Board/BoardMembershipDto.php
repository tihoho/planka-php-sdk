<?php

declare(strict_types=1);

namespace Planka\Bridge\Views\Dto\Board;

use Planka\Bridge\Contracts\Dto\OutputDtoInterface;
use DateTimeImmutable;

final class BoardMembershipDto implements OutputDtoInterface
{
    public function __construct(
        public readonly string $id,
        public readonly DateTimeImmutable $createdAt,
        public readonly ?DateTimeImmutable $updatedAt,
        public string $role,
        public bool $canComment,
        public string $boardId,
        public string $userId
    ) {
    }
}