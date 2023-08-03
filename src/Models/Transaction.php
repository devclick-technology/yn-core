<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use YouNegotiate\Models\Interfaces\ITransaction;

class Transaction extends Model implements ITransaction
{
    protected $fillable = ['transaction_id', 'consumer_login_id', 'transaction_type', 'consumer_id', 'company_id',
        'payment_profile_id', 'status', 'gateway_respnse_raw', 'status', 'status_code', 'amount',
        'flat_transaction_charges', 'rnn_share', 'company_share', 'subclient1_share', '	subclient2_share', 'payment_mode', '	last4digit', 'sub_client1_id', 'sub_client2_id', 'processing_charges',
        'rnn_invoice_id', 'superadmin_process',
    ];

    protected $appends = ['rnn_share_amount'];

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }

    public function getRnnShareAmountAttribute()
    {
        return $this->rnn_share;
    }

    public function scheduleTransaction(): HasOne
    {
        return $this->hasOne(ScheduleTransaction::class, 'transaction_id', 'transaction_id');
    }

    public function paymentProfileWithTrash(): BelongsTo
    {
        return $this->belongsTo(PaymentProfile::class, 'payment_profile_id')->withTrashed();
    }
}
