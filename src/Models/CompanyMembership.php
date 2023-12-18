<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Enums\CompanyMembershipStatus;

class CompanyMembership extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'membership_id',
        'next_membership_plan_id',
        'status',
        'current_plan_start',
        'current_plan_end',
        'auto_renew',
        'cancelled_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => CompanyMembershipStatus::class,
        'auto_renew' => 'boolean',
        'current_plan_start' => 'datetime',
        'current_plan_end' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    public function nextMembershipPlan(): BelongsTo
    {
        return $this->belongsTo(Membership::class, 'next_membership_plan_id');
    }
}
