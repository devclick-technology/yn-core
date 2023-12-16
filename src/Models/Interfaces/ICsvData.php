<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property int|null $subclient_id
 * @property string $csv_filename
 * @property string $csv_header
 * @property string $csv_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
interface ICsvData
{
}
