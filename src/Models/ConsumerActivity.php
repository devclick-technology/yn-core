<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IConsumerActivity;
use YouNegotiate\Traits\CompanyIDTrait;

class ConsumerActivity extends BaseModel implements IConsumerActivity
{
    use CompanyIDTrait;

    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
