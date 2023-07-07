<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IPaymentProfile;

class PaymentProfile extends Model implements IPaymentProfile
{
    use HasFactory;

    protected $fillable = [
        'consumer_id',
        'company_id',
        'subclient1_id',
        'subclient2_id',
        'method',
        'last4digit',
        'gateway_token',
        'routing_number',
        'account_number',
        'expirity',
    ];
}
