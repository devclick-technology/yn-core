<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IBulkEmail;

class BulkEmail extends Model implements IBulkEmail
{
    use SoftDeletes;

    protected $fillable = ['name', 'template_id', 'group_id'];
}
