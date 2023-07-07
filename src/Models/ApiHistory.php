<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IApiHistory;

class ApiHistory extends model implements IApiHistory
{
    protected $table = 'api_histories';

    protected $fillable = [
        'company_id', 'total_uploaded', 'accounts_successful', 'accounts_failed', 'accounts_processed',
        'type', 'status', 'failed_list',
    ];
}
