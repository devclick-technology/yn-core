<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Consumer;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $group_id
 * @property int $consumer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Consumer|null $consumer
 */

interface IGroupMember
{
}