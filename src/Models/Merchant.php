<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IMerchant;

class Merchant extends Model implements IMerchant
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
