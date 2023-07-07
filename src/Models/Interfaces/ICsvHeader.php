<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $company_id
 * @property int|null $subclient_id
 * @property string|null $saved_headers
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $name
 */

interface ICsvHeader
{
}