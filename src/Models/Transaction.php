<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ITransaction;

class Transaction extends Model implements ITransaction
{
    protected $fillable = ['transaction_id', 'consumer_login_id', 'transaction_type', 'consumer_id', 'company_id',
        'payment_profile_id', 'status', 'gateway_respnse_raw', 'status', 'status_code', 'amount',
        'flat_transaction_charges', 'rnn_share', 'company_share', 'subclient1_share', '	subclient2_share', 'payment_mode', '	last4digit', 'sub_client1_id', 'sub_client2_id', 'processing_charges',
        'rnn_invoice_id', 'superadmin_process',
    ];

    protected $appends = ['rnn_share_amount'];
}
