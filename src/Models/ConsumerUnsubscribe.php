<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IConsumerUnsubscribe;

class ConsumerUnsubscribe extends Model implements IConsumerUnsubscribe
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function Consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }

    public function Company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function emailSubscribed()
    {
        return $this->email != null;
    }

    public function smsSubscribed()
    {
        return $this->phone != null;
    }
}
