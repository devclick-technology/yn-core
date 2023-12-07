<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyMembership extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'company_id',
        'membership_id',
        'status',
        'current_plan_start',
        'current_plan_end',
        'auto_renew',
        'next_membership_plan_id',
        'cancelled_at',
    ];

    protected $casts = [
        'current_plan_start' => 'datetime',
        'current_plan_end' => 'datetime',
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