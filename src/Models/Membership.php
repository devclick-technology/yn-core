<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Enums\MembershipFrequency;

class Membership extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'frequency',
        'upload_accounts_limit',
        'fees',
        'status',
        'meta_data',
    ];

    protected $casts = [
        'frequency' => MembershipFrequency::class,
        'status' => 'boolean',
        'meta_data' => 'array',
    ];

    public function companiesMembership(): HasMany
    {
        return $this->hasMany(CompanyMembership::class);
    }
}
