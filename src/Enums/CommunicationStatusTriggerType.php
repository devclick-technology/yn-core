<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Values;

enum CommunicationStatusTriggerType: int
{
    use Values;

    case AUTOMATIC = 1;
    case SCHEDULED = 2;
    case BOTH = 3;
}
