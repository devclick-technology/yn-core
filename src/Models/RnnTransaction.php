<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IRnnTransaction;

class RnnTransaction extends BaseModel implements IRnnTransaction
{
    protected $table = 'rnn_transactions';

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
