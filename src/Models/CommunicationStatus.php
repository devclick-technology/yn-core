<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use YouNegotiate\Models\Interfaces\ICommunicationStatus;

class CommunicationStatus extends Model implements ICommunicationStatus
{
    protected $table = 'communication_status';

    public function automationCampaign(): HasOne
    {
        return $this->hasOne(AutomationCampaign::class, 'cmp_status_id');
    }

    public function automationCampaigns(): HasMany
    {
        return $this->hasMany(AutomationCampaign::class, 'cmp_status_id');
    }

    public function automatedCampaign()
    {
        return $this->hasOne(AutomatedCampaign::class, 'cmp_status_id');
    }

    public function emailTemplate(): BelongsTo
    {
        return $this->belongsTo(AutomatedTemplate::class, 'aet_id');
    }

    public function smsTemplate(): BelongsTo
    {
        return $this->belongsTo(AutomatedTemplate::class, 'ast_id');
    }
}
