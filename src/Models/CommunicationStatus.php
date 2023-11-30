<?php

namespace YouNegotiate\Models;

use YouNegotiate\Enums\CommunicationStatusTriggerType;
use YouNegotiate\Models\Interfaces\ICommunicationStatus;

class CommunicationStatus extends BaseModel implements ICommunicationStatus
{
    protected $table = 'communication_status';

    protected $casts = [
        'trigger_type' => CommunicationStatusTriggerType::class,
    ];

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
        return $this->belongsTo(AutomatedTemplate::class, 'automated_email_template_id');
    }

    public function smsTemplate()
    {
        return $this->belongsTo(AutomatedTemplate::class, 'automated_sms_template_id');
    }
}
