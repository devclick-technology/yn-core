<?php

namespace YouNegotiate\Enums;


use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum BankAccountType: string
{
    use Names;
    use Values;
    use SelectionBox;

    case CHECKING = 'checking';
    case SAVING = 'saving';
}
