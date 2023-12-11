<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\Values;

enum MembershipFrequency: string
{
    use Names;
    use Values;

    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';

    /**
     * @return array<string, string>
     */
    public static function displaySelectionBox(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case): array => [
            $case->value => $case->displayName(),
        ])->toArray();
    }
}
