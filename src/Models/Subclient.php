<?php

namespace YouNegotiate\Models;

use YouNegotiate\Traits\CompanyIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ISubclient;

class Subclient extends Model implements ISubclient
{
    use SoftDeletes, CompanyIDTrait, HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'company_id'];
}
