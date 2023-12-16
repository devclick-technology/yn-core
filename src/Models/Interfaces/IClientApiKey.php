<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;

/**
 * @property int $id
 * @property int $company_id
 * @property string $api_key
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $twilio_phone_no
 * @property-read Company|null $company
 */
interface IClientApiKey
{
}
