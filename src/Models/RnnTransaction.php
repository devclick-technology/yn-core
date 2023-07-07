<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IRnnTransaction;

class RnnTransaction extends Model implements IRnnTransaction
{
    protected $table = 'rnn_transactions';
}
