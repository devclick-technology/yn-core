<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ILicenceTransaction;

class LicenceTransaction extends BaseModel implements ILicenceTransaction
{
    protected $table = 'license_transactions';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
