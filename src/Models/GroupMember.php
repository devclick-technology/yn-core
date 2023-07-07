<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IGroupMember;

class GroupMember extends Model implements IGroupMember
{
    protected $fillable = ['group_id', 'consumer_id'];
}
