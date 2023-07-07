<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IProfilePermission;

class ProfilePermission extends Model implements IProfilePermission
{
    protected $table = 'consumer_permissions';
}
