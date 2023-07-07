<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ILicenceTransaction;

class LicenceTransaction extends Model implements ILicenceTransaction
{
    protected $table = 'license_transactions';
}
