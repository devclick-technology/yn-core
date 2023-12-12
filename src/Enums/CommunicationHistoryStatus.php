<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

enum CommunicationHistoryStatus: int
{
    case SUCCESS = 1;
    case FAILED = 2;
    case IN_PROGRESS = 3;
}
