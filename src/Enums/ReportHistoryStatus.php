<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

enum ReportHistoryStatus: string
{
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
