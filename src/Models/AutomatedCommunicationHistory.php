<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IAutomatedCommunicationHistory;

class AutomatedCommunicationHistory extends Model implements IAutomatedCommunicationHistory
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $table = 'automated_communication_histories';
}
