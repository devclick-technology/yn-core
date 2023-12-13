<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\SelectionBox;
use YouNegotiate\Enums\Traits\Values;

enum AutomatedTemplateType: string
{
    use SelectionBox;
    use Values;

    case EMAIL = 'email';
    case SMS = 'sms';
}
