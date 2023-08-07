<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IPaymentProfile;

class PaymentProfile extends BaseModel implements IPaymentProfile
{
    use HasFactory;
    use SoftDeletes;

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
