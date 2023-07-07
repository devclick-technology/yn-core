<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $feature_name
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

interface IFeatureFlag
{
}