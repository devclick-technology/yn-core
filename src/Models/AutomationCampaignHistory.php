<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Enums\AutomationCampaignHistoryStatus;

class AutomationCampaignHistory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'automation_campaign_id',
        'consumer_id',
        'company_id',
        'sub_client_one_id',
        'sub_client_two_id',
        'automated_template_id',
        'automated_template_type',
        'phone',
        'email',
        'sms_cost',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['status' => AutomationCampaignHistoryStatus::class];
}
