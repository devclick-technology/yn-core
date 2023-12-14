<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

enum ReportHistoryStatus: int
{
    case SUCCESS = 1;
    case FAILED = 0;
}
