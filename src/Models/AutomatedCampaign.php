<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IAutomatedCampaign;

class AutomatedCampaign extends Model implements IAutomatedCampaign
{
    use SoftDeletes;

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected $fillable = ['company_id', 'comm_status_id', 'email_temp_id', 'sms_temp_id'];

    protected $table = 'automated_campaigns';
}
