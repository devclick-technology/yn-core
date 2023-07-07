<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICommunicationHistory;

class CommunicationHistory extends Model implements ICommunicationHistory
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
