<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\AutomatedCampaign;
use YouNegotiate\Models\AutomatedTemplate;
use YouNegotiate\Models\AutomationCampaign;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $status_code
 * @property string|null $desc
 * @property int|null $automated_email_template_id
 * @property int|null $automated_sms_template_id
 * @property int $trigger_type
 * @property string $trigger_description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read AutomatedCampaign|null $automatedCampaign
 * @property-read AutomationCampaign|null $automationCampaign
 * @property-read Collection<int, AutomationCampaign> $automationCampaigns
 * @property-read int|null $automation_campaigns_count
 * @property-read AutomatedTemplate|null $emailTemplate
 * @property-read AutomatedTemplate|null $smsTemplate
 */

interface ICommunicationStatus
{
}