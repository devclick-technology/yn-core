<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Values;

enum AutomatedTemplateType: string
{
    use Values;

    case EMAIL = 'email';
    case SMS = 'sms';
}
