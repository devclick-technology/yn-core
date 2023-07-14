<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IConsumerLog;

class ConsumerLog extends Model implements IConsumerLog
{
    protected $fillable = [
        'id',
        'company_id',
        'user_id',
        'consumer_id',
        'log_message',
        'created_at',
        'updated_at',
    ];

    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
