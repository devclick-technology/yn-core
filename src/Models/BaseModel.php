<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
