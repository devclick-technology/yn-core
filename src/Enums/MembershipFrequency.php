<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum MembershipFrequency: string
{
    use SelectionBox;
    use Values;

    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
    case YEARLY = 'yearly';

    /**
     * @return array<string>
     */
    public static function orderByForMembershipSettings(): array
    {
        return [
            self::WEEKLY->value,
            self::MONTHLY->value,
            self::YEARLY->value,
        ];
    }
}
