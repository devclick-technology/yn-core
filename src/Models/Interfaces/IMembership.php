<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $description
 * @property string $frequency
 * @property int $upload_accounts_limit
 * @property float $fee
 * @property boolean $status
 * @property Json|null $meta_data
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */

interface IMembership
{
}