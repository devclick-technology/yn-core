<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Enums\CommunicationCode;
use YouNegotiate\Enums\CommunicationStatusTriggerType;

class CommunicationStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'automated_email_template_id',
        'automated_sms_template_id',
        'description',
        'code',
        'trigger_type',
        'trigger_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'code' => CommunicationCode::class,
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

    public function emailTemplate(): BelongsTo
    {
        return $this->belongsTo(AutomatedTemplate::class, 'automated_email_template_id');
    }

    public function smsTemplate(): BelongsTo
    {
        return $this->belongsTo(AutomatedTemplate::class, 'automated_sms_template_id');
    }
}
