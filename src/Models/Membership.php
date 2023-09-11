<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IMembership;

class Membership extends Model implements IMembership
{
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
}