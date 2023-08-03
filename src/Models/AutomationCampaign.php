<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use YouNegotiate\Models\Interfaces\IAutomationCampaign;

class AutomationCampaign extends Model implements IAutomationCampaign
{
    protected $table = 'automation_campaigns';

    public function communicationStatus(): BelongsTo
    {
        return $this->belongsTo(CommunicationStatus::class, 'cmp_status_id');
    }

    public function creditorCampaign(): HasOne
    {
        return $this->hasOne(CreditorAutomation::class, 'autocamp_id')->where('creditor_id', auth()->user()->id);
    }

    public function creditorAutomation()
    {
        return $this->hasOne(CreditorAutomation::class, 'autocamp_id');
    }

    public function creditorAutomations(): HasMany
    {
        return $this->hasMany(CreditorAutomation::class, 'autocamp_id');
    }
}
