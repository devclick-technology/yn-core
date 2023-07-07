<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IClientLog;

class ClientLog extends Model implements IClientLog
{
    protected $table = 'client_logs';

    protected $fillable = [
        'id', 'company_id', 'user_id', 'log_message', 'consumer_id',
    ];
}
