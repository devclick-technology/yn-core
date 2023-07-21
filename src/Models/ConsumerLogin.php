<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IConsumerLogin;

class ConsumerLogin extends Model implements IConsumerLogin
{
    protected $fillable = ['email', 'password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
