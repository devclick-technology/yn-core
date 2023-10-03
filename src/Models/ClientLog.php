<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IClientLog;

class ClientLog extends BaseModel implements IClientLog
{
    protected $table = 'client_logs';
}
