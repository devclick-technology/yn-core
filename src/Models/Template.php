<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ITemplate;

class Template extends Model implements ITemplate
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'company_id', 'created_by', 'group_id'];
}
