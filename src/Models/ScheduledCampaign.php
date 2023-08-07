<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IScheduledCampaign;

class ScheduledCampaign extends BaseModel implements IScheduledCampaign
{
    protected $table = 'scheduled_campaigns';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
