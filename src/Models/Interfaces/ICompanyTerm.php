<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;

/**
 * @property int $id
 * @property int $company_id
 * @property int|null $rnn_share
 * @property int|null $flat_transaction_fee
 * @property int|null $monthly_licensing_fee
 * @property int|null $processing_charges_percent
 * @property int|null $min_one_time_percent
 * @property int|null $min_monthly_pay_percent
 * @property int|null $pay_setup_discount_percent
 * @property int|null $pif_discount_percent
 * @property string|null $negotiation_rule
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 */
interface ICompanyTerm
{
}
