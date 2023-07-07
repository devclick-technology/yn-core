<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property string|null $logo_path
 * @property string|null $bg_color
 * @property string|null $button_color
 * @property string|null $font_color
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 */

interface ICustomStyle
{
}