<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\CommunicationStatus;
use YouNegotiate\Models\CreditorAutomation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $cmp_status_id
 * @property string|null $frequency
 * @property string|null $month_day
 * @property string|null $week_day
 * @property string|null $hours
 * @property string|null $minutes
 * @property string|null $start_date
 * @property int $enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read CommunicationStatus|null $communicationStatus
 * @property-read CreditorAutomation|null $creditorAutomation
 * @property-read Collection<int, CreditorAutomation> $creditorAutomations
 * @property-read int|null $creditor_automations_count
 * @property-read CreditorAutomation|null $creditorCampaign
 */

interface IAutomationCampaign
{
}