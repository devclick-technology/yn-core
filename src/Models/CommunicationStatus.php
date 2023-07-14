<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICommunicationStatus;

class CommunicationStatus extends Model implements ICommunicationStatus
{
    protected $table = 'communication_status';

    public function automationCampaign()
    {
        return $this->hasOne(AutomationCampaign::class, 'cmp_status_id');
    }

    public function automationCampaigns()
    {
        return $this->hasMany(AutomationCampaign::class, 'cmp_status_id');
    }

    public function automatedCampaign()
    {
        return $this->hasOne(AutomatedCampaign::class, 'cmp_status_id');
    }

    public function emailTemplate()
    {
        return $this->belongsTo(AutomatedTemplate::class, 'aet_id');
    }

    public function smsTemplate()
    {
        return $this->belongsTo(AutomatedTemplate::class, 'ast_id');
    }
}
