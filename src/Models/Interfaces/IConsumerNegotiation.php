<?php

namespace YouNegotiate\Models\Interfaces;

use BackedEnum;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\Consumer;

/**
 * @property int $id
 * @property int $consumer_id
 * @property int $company_id
 * @property string|BackedEnum $negotiation_type
 * @property string|null $payment_plan_current_balance
 * @property string|null $one_time_settlement
 * @property string|null $negotiate_amount
 * @property string|null $monthly_amount
 * @property string|null $no_of_installments
 * @property string|null $last_month_amount
 * @property string|null $installment_type
 * @property string|null $first_pay_date
 * @property bool $offer_accepted
 * @property string|null $offer_accepted_at
 * @property string|null $counter_one_time_amount
 * @property string|null $counter_negotiate_amount
 * @property string|null $counter_monthly_amount
 * @property string|null $counter_no_of_installments
 * @property string|null $counter_last_month_amount
 * @property string|null $counter_first_pay_date
 * @property bool $counter_offer_accepted
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $communication_type
 * @property string|null $communication_data
 * @property string|null $reason
 * @property string|null $note
 * @property int $active_negotiation
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $account_number
 * @property string|null $approved_by
 * @property string|null $counter_note
 * @property-read Consumer|null $consumer
 */
interface IConsumerNegotiation
{
}
