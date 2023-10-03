<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IGroupMember;

class GroupMember extends BaseModel implements IGroupMember
{
    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
