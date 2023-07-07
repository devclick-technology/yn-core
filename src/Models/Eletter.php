<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IEletter;

class Eletter extends Model implements IEletter
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'company_id'];
}
