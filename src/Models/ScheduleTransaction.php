<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IScheduleTransaction;

class ScheduleTransaction extends Model implements IScheduleTransaction
{
    use HasFactory;

    protected $fillable = [
        'consumer_id',
        'consumer_login_id',
        'company_id',
        'sub_client1_id',
        'sub_client2_id',
        'payment_profile_id',
        'schedule_date',
        'status',
        'status_code',
        'amount',
        'processing_charges',
        'flat_transaction_charges',
        'rnn_share',
        'company_share',
        'subclient1_share',
        'subclient2_share',
        'attempt_count',
        'last_attempted_at',
        'transaction_type',
    ];
}
