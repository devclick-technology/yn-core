<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Consumer;

/**
 * @property int $id
 * @property string|null $transaction_id
 * @property int|null $consumer_login_id
 * @property string|null $transaction_type
 * @property string|null $consumer_id
 * @property string|null $company_id
 * @property string|null $payment_profile_id
 * @property string|null $gateway_respnse_raw
 * @property string|null $status
 * @property string|null $status_code
 * @property string|null $amount
 * @property string|null $processing_charges
 * @property string|null $flat_transaction_charges
 * @property string|null $rnn_share
 * @property string|null $company_share
 * @property string|null $subclient1_share
 * @property string|null $subclient2_share
 * @property string|null $payment_mode
 * @property string|null $last4digit
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $sub_client1_id
 * @property int|null $sub_client2_id
 * @property string|null $rnn_share_pass
 * @property int|null $rnn_transaction_id
 * @property int $rnn_invoice_id
 * @property int $superadmin_process 1=from superadmin process
 * @property-read Consumer|null $consumer
 * @property-read mixed $rnn_share_amount
 */
interface ITransaction
{
}
