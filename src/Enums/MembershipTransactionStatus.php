<?php

namespace YouNegotiate\Enums;

enum MembershipTransactionStatus: string
{
    case SUCCESS = 'success';
    case FAILED = 'failed';
}
