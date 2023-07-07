<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $company_id
 * @property string|null $primary_color
 * @property string|null $secondary_color
 * @property string|null $background_color
 * @property string|null $customer_communication_link
 * @property string|null $old_communication_link
 * @property string|null $embed_code
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $logo_name
 */

interface IPersonalizedLogo
{
}