<?php

namespace YouNegotiate\Models;

use YouNegotiate\Traits\CompanyIDTrait;
use YouNegotiate\Models\Interfaces\IConsumerActivity;

class ConsumerActivity extends BaseModel implements IConsumerActivity
{
    use CompanyIDTrait;

    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
