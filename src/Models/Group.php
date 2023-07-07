<?php

namespace YouNegotiate\Models;

use YouNegotiate\Traits\CompanyIDTrait;
use YouNegotiate\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IGroup;

class Group extends Model implements IGroup
{
    use SoftDeletes, CompanyIDTrait, CreatedByTrait;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'send_template'];
}
