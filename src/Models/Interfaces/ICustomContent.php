<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Subclient;

/**
 * @property int $id
 * @property int $company_id
 * @property int|null $subclient_id
 * @property string $title
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 * @property-read Subclient|null $subclient
 */
interface ICustomContent
{
}
