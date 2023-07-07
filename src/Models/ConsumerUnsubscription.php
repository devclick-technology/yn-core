<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IConsumerUnsubscription;

class ConsumerUnsubscription extends Model implements IConsumerUnsubscription
{
    protected $table = 'consumer_unsubscribes';

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
