<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use YouNegotiate\Models\Group;
use YouNegotiate\Models\Template;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $company_id
 * @property string|null $group_id
 * @property string|null $template_id
 * @property string|null $frequency
 * @property int $enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $hours
 * @property string $minutes
 * @property string|null $start_date
 * @property-read Company|null $company
 * @property-read Group|null $group
 * @property-read Template|null $template
 */

interface IScheduledCampaign
{
}