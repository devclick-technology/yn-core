<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IConsumerLog;

class ConsumerLog extends BaseModel implements IConsumerLog
{
    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
