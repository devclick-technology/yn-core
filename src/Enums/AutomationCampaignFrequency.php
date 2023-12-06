<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\Values;

enum AutomationCampaignFrequency: string
{
    use Names;
    use Values;
    case ONCE = 'once';
    case HOURLY = 'hourly';
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';

    public static function displaySelectionBox(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case): array => [
            $case->value => $case->displayName,
        ])->toArray();

    }
}