<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICompanyMembership;

class CompanyMembership extends Model implements ICompanyMembership
{
    public $timestamps = false;

    protected $guarded = [];
}