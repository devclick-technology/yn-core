<?php

namespace YouNegotiate\Models\Interfaces;

use App\Models\User;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\AutomationCampaign;

/**
 * @property int $id
 * @property int $company_id
 * @property int $creditor_id
 * @property int $autocamp_id
 * @property int $enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read AutomationCampaign|null $automatedCampaign
 * @property-read User|null $automatedCreditor
 */
interface ICreditorAutomation
{
}
