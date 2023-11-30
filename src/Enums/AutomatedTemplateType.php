<?php

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\Values;

enum AutomatedTemplateType: string
{
    use Values;
    use Names;
    case EMAIL = 'email';
    case SMS = 'sms';
}
