<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'cost',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['status' => AutomationCampaignHistoryStatus::class];

    public function automationCampaign(): BelongsTo
    {
        return $this->belongsTo(AutomatedCampaign::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function automatedTemplate(): BelongsTo
    {
        return $this->belongsTo(AutomatedTemplate::class);
    }
}
