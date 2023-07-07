<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICommunicationStatus;

class CommunicationStatus extends Model implements ICommunicationStatus
{
    protected $table = 'communication_status';
}
