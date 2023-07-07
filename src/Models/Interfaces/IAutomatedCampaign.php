<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use App\Models\CommunicationStatus;
use App\Models\Company;
use App\Models\AutomatedTemplate;

/**
 * @property int $id
 * @property int $company_id
 * @property int $comm_status_id
 * @property int|null $email_temp_id
 * @property int|null $sms_temp_id
 * @property int $group_member_count
 * @property int $total_sent
 * @property int $smstotal_sent
 * @property int $total_failed
 * @property int $smstotal_failed
 * @property int $total_delivered
 * @property int $smstotal_delivered
 * @property int $total_balance_delivered
 * @property int $smstotal_balance_delivered
 * @property string|null $failed_consumers
 * @property string|null $smsfailed_consumers
 * @property Carbon|null $sent_at
 * @property string|null $smssent_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read CommunicationStatus|null $communicationStatus
 * @property-read Company|null $company
 * @property-read AutomatedTemplate|null $emailTemplate
 * @property-read AutomatedTemplate|null $smsTemplate
 */

interface IAutomatedCampaign
{
}
