<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Values;

enum CompanyMembershipStatus: string
{
    use Values;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
