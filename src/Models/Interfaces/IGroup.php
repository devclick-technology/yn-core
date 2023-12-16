<?php

namespace YouNegotiate\Models\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\Campaign;
use YouNegotiate\Models\Company;

/**
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property string|null $description
 * @property string|null $customer_status_rule
 * @property string|null $customer_custom_rule
 * @property float|null $pif_balance_discount_percent
 * @property float|null $ppa_balance_discount_percent
 * @property float|null $min_monthly_pay_percent
 * @property float|null $max_days_first_pay
 * @property int $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int $enabled
 * @property int|null $cfpb_communication
 * @property int|null $file_upload_history_id
 * @property-read Collection<int, Campaign> $campaigns
 * @property-read int|null $campaigns_count
 * @property-read Company|null $company
 * @property-read User|null $createdBy
 * @property-read mixed $member_count
 * @property-read mixed $total_balance
 */
interface IGroup
{
}
