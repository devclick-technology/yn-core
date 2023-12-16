<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property string|null $host
 * @property string|null $username
 * @property string|null $password
 * @property string|null $port
 * @property string|null $root
 * @property string|null $timeout
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $type
 */
interface ISFTPDetails
{
}
