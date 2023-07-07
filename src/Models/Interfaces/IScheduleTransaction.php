<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Consumer;
use YouNegotiate\Models\PaymentProfile;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $transaction_id // comes from payment provider, null by default
 * @property string $transaction_type // enum - pif, installment,
 * @property string $schedule_date
 * @property int $consumer_id
 * @property int $company_id
 * @property string|null $sub_client1_id
 * @property string|null $sub_client2_id
 * @property string|null $payment_profile_id
 * @property string|null $gateway_respnse_raw
 * @property string|null $status
 * @property int $attempt_count
 * @property Carbon|null $last_attempted_at
 * @property string|null $status_code
 * @property float $amount
 * @property float $processing_charges
 * @property float $flat_transaction_charges
 * @property float $rnn_share
 * @property float $company_share
 * @property float $subclient1_share
 * @property float $subclient2_share
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $payment_complete
 * @property string|null $previous_schedule_date
 * @property string|null $schedule_time
 * @property int|null $stripe_payment_detail_id
 * @property-read Consumer|null $consumer
 * @property-read PaymentProfile|null $paymentProfile
 */

interface IScheduleTransaction
{
}