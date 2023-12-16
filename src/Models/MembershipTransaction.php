<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IMembershipTransaction;

class MembershipTransaction extends BaseModel implements IMembershipTransaction
{
    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class, 'membership_id');
    }
}
