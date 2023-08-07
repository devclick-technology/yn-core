<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IConsumerLogin;

class ConsumerLogin extends BaseModel implements IConsumerLogin
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
