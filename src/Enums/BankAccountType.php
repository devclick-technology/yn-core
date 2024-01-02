<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum BankAccountType: string
{
    use Names;
    use SelectionBox;
    use Values;

    case CHECKING = 'checking';
    case SAVINGS = 'savings';
}
