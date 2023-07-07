<?php

namespace YouNegotiate\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Company;

trait CompanyIDTrait
{
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
