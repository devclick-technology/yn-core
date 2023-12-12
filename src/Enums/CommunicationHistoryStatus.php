<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\SelectionBox;

enum CommunicationHistoryStatus: int
{
    use SelectionBox;

    case SUCCESS = 1;
    case FAILED = 2;
    case IN_PROGRESS = 3;
}
