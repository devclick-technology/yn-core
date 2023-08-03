<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\ILicenceTransaction;

class LicenceTransaction extends Model implements ILicenceTransaction
{
    protected $table = 'license_transactions';

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
