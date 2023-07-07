<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property int|null $sub_client1_id
 * @property int|null $sub_client2_id
 * @property string|null $term_type
 * @property string|null $term_value
 * @property int $one_time_rule
 * @property string|null $min_one_time_percent
 * @property string|null $monthly_pay_percent
 * @property string|null $max_negotiation_discount_percent
 * @property string|null $pif_discount_percent
 * @property string|null $master_negotiation_rule
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 */

interface ICustomConsumerTerm
{
}