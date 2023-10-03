<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IProfilePermission;

class ProfilePermission extends BaseModel implements IProfilePermission
{
    protected $table = 'consumer_permissions';
}
