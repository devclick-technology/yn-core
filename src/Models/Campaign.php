<?php

namespace YouNegotiate\Models;

use YouNegotiate\Traits\CompanyIDTrait;
use YouNegotiate\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICampaign;

class Campaign extends Model implements ICampaign
{
    use SoftDeletes, CompanyIDTrait, CreatedByTrait;

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected $fillable = ['group_id', 'template_id'];
}
