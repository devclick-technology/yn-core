<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Enums\AutomationCampaignFrequency;

class AutomationCampaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['communication_status_id', 'frequency', 'month_day', 'week_day', 'hourly', 'hours', 'minutes', 'start_date', 'enabled'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'frequency' => AutomationCampaignFrequency::class,
        'start_date' => 'datetime',
        'enabled' => 'boolean',
    ];

    public function communicationStatus(): BelongsTo
    {
        return $this->belongsTo(CommunicationStatus::class);
    }
}
