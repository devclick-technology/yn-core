<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICompanyMembership;

class CompanyMembership extends Model implements ICompanyMembership
{
    protected $guarded = [];
}