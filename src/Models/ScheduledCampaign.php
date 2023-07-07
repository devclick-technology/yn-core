<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IScheduledCampaign;

class ScheduledCampaign extends Model implements IScheduledCampaign
{
    protected $table = 'scheduled_campaigns';
}
