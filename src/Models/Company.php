<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICompany;

class Company extends Model implements ICompany
{
    use SoftDeletes, HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'status'];
}
