<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IMembership;

class Membership extends Model implements IMembership
{
    use SoftDeletes;
    
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function companiesMembership(): HasMany
    {
        return $this->hasMany(CompanyMembership::class);
    }
}