<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICompanyTerm;

class CompanyTerm extends BaseModel implements ICompanyTerm
{
    use SoftDeletes;

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
