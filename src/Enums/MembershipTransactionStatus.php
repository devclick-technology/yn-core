<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;

enum MembershipTransactionStatus: string
{
    use Names;

    case SUCCESS = 'success';
    case FAILED = 'failed';
}
