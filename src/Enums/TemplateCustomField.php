<?php

declare(strict_types=1);

namespace YouNegotiate\Enums;

use YouNegotiate\Enums\Traits\Names;
use YouNegotiate\Enums\Traits\Values;

enum TemplateCustomField: string
{
    use Names;
    use Values;

    case FIRST_NAME = '[First Name]';
    case LAST_NAME = '[Last Name]';
    case ACCOUNT_NUMBER = '[Account Number]';
    case MASTER_COMPANY_NAME = '[Master Company Name]';
    case SUBCLIENT_1_NAME = '[Sub Client 1 Name]';
    case SUBCLIENT_2_NAME = '[Sub Client 2 Name]';
    case SUBCLIENT_1_ACCOUNT_NUMBER = '[Subclient 1 Account Number]';
    case SUBCLIENT_2_ACCOUNT_NUMBER = '[Subclient 2 Account Number]';
    case ACCOUNT_BALANCE = '[Account Balance]';
    case PAYMENT_SETUP_DISCOUNT_PERCENTAGE = '[Payment Set up Discount %]';
    case PAYMENT_SETUP_DISCOUNT_AMOUNT = '[Payment Set up Discount Amount]';
    case PAY_IN_FULL_DISCOUNT_PERCENTAGE = '[Pay in Full Discount %]';
    case PAY_IN_FULL_DISCOUNT_AMOUNT = '[Pay in Full Discount Amount]';
    case YOU_NEGOTIATE_LINK = '[You Negotiate Link]';
    case PASS_THROUGH_1 = '[Pass Through 1]';
    case PASS_THROUGH_2 = '[Pass Through 2]';
    case PASS_THROUGH_3 = '[Pass Through 3]';
    case PASS_THROUGH_4 = '[Pass Through 4]';
    case PASS_THROUGH_5 = '[Pass Through 5]';
    case ACCOUNT_QR_CODE = '[Account QR Code]';
}
