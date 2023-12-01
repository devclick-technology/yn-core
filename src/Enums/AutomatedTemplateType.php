<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\Values;

enum AutomatedTemplateType: string
{
    use Names;
    use Values;

    case EMAIL = 'email';
    case SMS = 'sms';
}
