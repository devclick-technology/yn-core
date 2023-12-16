<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $company_id
 * @property int|null $group_id
 * @property string|null $subclient1_id
 * @property string|null $subclient2_id
 * @property string $title
 * @property string $subject
 * @property string $message
 * @property int $disabled
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $transferred
 * @property-read int|null $campaigns_count
 */
interface IEletter
{
}
