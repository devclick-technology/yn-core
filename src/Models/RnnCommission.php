<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IRnnCommission;

class RnnCommission extends Model implements IRnnCommission
{
    protected $fillable = [
        'company_id', 'user_id', 'commission_percent',
    ];
}
