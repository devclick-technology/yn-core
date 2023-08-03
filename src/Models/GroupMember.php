<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IGroupMember;

class GroupMember extends Model implements IGroupMember
{
    protected $fillable = ['group_id', 'consumer_id'];

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
