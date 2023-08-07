<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IAutomationCampaign;

class AutomationCampaign extends BaseModel implements IAutomationCampaign
{
    protected $table = 'automation_campaigns';

    public function communicationStatus()
    {
        return $this->belongsTo(CommunicationStatus::class, 'cmp_status_id');
    }

    public function creditorCampaign()
    {
        return $this->hasOne(CreditorAutomation::class, 'autocamp_id')->where('creditor_id', auth()->user()->id);
    }

    public function creditorAutomation()
    {
        return $this->hasOne(CreditorAutomation::class, 'autocamp_id');
    }

    public function creditorAutomations()
    {
        return $this->hasMany(CreditorAutomation::class, 'autocamp_id');
    }
}
