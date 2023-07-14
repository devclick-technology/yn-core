<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function merchant_cc(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id')
            ->where('merchant_type', 'cc')
            ->whereNotNull('verified_at');
    }

    public function merchant_ach(): BelongsTo
    {
        return $this->belongsTo(Merchant::class, 'merchant_id')
            ->where('merchant_type', 'ach')
            ->whereNotNull('verified_at');
    }

    public function merchant(): BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }
}
