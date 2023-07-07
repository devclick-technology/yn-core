<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Campaign;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string|null $subject
 * @property string $company_id
 * @property string $created_by
 * @property string $type
 * @property string|null $content
 * @property Carbon|null $deleted_at
 * @property int $enabled
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $group_id
 * @property int|null $eletter_id
 * @property-read Collection<int, Campaign> $campaigns
 * @property-read int|null $campaigns_count
 * @property-read User|null $createdBy
 */

interface ITemplate
{
}