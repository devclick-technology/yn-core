<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $company_id
 * @property int|null $total_uploaded
 * @property int|null $accounts_successful
 * @property int|null $accounts_failed
 * @property int|null $accounts_processed
 * @property string|null $type
 * @property string|null $status
 * @property string|null $failed_list
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
interface IApiHistory
{
}
