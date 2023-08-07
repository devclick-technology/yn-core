<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IConsumerUnsubscribe;

class ConsumerUnsubscribe extends BaseModel implements IConsumerUnsubscribe
{
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
