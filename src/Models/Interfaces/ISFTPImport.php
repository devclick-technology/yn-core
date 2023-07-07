<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property int|null $subclient_id
 * @property string $host
 * @property string $username
 * @property string $password
 * @property string|null $keyfile
 * @property string $root
 * @property int $port
 * @property int $pause 0 enable 1 disable
 * @property string $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

interface ISFTPImport
{
}