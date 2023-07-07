<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use YouNegotiate\Models\Group;
use YouNegotiate\Models\Template;
use App\Models\User;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property int $group_id
 * @property int $template_id
 * @property int $group_member_count
 * @property int $total_sent
 * @property int $total_failed
 * @property int $total_delivered
 * @property int $total_balance_delivered
 * @property string|null $failed_consumers
 * @property int $created_by
 * @property Carbon|null $sent_at
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 * @property-read User|null $createdBy
 * @property-read Group $group
 * @property-read Template $template
 */

interface ICampaign
{
}