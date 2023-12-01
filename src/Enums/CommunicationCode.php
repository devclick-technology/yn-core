<?php

namespace YouNegotiate\Enums;

enum CommunicationCode: string
{
    case WELCOME = 'W-1';
    case NEW_ACCOUNT = 'N-1';
    case COUNTER_OFFER_BUT_NO_PAYMENT_SETUP = 'CO-1';
    case COUNTER_OFFER_BUT_NO_RESPONSE = 'CO-2';
    case OFFER_APPROVED_BUT_NO_PAYMENT_SETUP = 'O-1';
    case PAY_IN_PIF_AND_PAYMENT_SETUP_DONE = 'O-2';
    case PAY_IN_INSTALLMENT_AND_PAYMENT_SETUP_DONE = 'O-3';
    case OFFER_DENIED = 'O-4';
    case PAYMENT_FAILED_WHEN_PIF = 'PP-1';
    case PAYMENT_FAILED_WHEN_INSTALLMENT = 'PP-2';
    case UPCOMING_PAYMENT_REMINDER = 'PP-3';
    case CRON_PAYMENT_SUCCESSFUL = 'PP-4';
    case CREDITOR_REMOVED_ACCOUNT = 'G-1';
    case BALANCE_PAID = 'G-2';
}
