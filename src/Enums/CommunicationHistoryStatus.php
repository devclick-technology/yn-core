<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;

enum CommunicationHistoryStatus: int
{
    use Names;

    case SUCCESS = 1;
    case FAILED = 2;
    case IN_PROGRESS = 3;

    public static function displaySelectionBox(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case): array => [
            $case->value => $case->displayName(),
        ])->toArray();
    }
}
