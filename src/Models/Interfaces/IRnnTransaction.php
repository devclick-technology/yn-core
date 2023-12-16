<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;

/**
 * @property int $id
 * @property int $company_id
 * @property string $amount
 * @property string $responce
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $packet
 * @property string|null $billing_cycle_start
 * @property string|null $billing_cycle_end
 * @property int|null $sms_count
 * @property int|null $phone_no_count
 * @property int|null $email_count
 * @property int|null $eletter_count
 * @property string|null $status
 * @property float|null $sms_cost
 * @property float|null $email_cost
 * @property float|null $eletter_cost
 * @property int $rnn_invoice_id
 * @property string|null $reference_number
 * @property int $superadmin_process 1=from superadmin process
 * @property-read Company|null $company
 */
interface IRnnTransaction
{
}
