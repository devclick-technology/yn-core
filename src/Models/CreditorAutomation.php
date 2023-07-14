<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICreditorAutomation;

class CreditorAutomation extends Model implements ICreditorAutomation
{
    protected $table = 'creditor_automations';

    public function automatedCampaign()
    {
        return $this->belongsTo(AutomationCampaign::class, 'autocamp_id');
    }

    public function automatedCreditor()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }
}
