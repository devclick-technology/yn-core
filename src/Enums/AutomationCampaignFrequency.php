<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum AutomationCampaignFrequency: string
{
    use SelectionBox;
    use Values;

    case ONCE = 'once';
    case HOURLY = 'hourly';
    case DAILY = 'daily';
    case WEEKLY = 'weekly';
    case MONTHLY = 'monthly';
}
