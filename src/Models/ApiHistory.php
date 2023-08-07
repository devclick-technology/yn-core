<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IApiHistory;

class ApiHistory extends BaseModel implements IApiHistory
{
    protected $table = 'api_histories';
}
