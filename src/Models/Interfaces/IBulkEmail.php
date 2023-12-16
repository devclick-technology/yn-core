<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Group;
use YouNegotiate\Models\Template;

/**
 * @property int $id
 * @property string $name
 * @property int $company_id
 * @property int $template_id
 * @property int $group_id
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 * @property-read Group|null $group
 * @property-read Template|null $template
 */
interface IBulkEmail
{
}
