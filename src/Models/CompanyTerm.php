<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICompanyTerm;

class CompanyTerm extends Model implements ICompanyTerm
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
