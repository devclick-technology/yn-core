<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IAutomationCampaign;

class AutomationCampaign extends Model implements IAutomationCampaign
{
    protected $table = 'automation_campaigns';
}
