<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IRnnTransaction;

class RnnTransaction extends Model implements IRnnTransaction
{
    protected $table = 'rnn_transactions';

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
