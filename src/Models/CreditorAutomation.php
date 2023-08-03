<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\ICreditorAutomation;

class CreditorAutomation extends Model implements ICreditorAutomation
{
    protected $table = 'creditor_automations';

    public function automatedCampaign(): BelongsTo
    {
        return $this->belongsTo(AutomationCampaign::class, 'autocamp_id');
    }

    public function automatedCreditor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }
}
