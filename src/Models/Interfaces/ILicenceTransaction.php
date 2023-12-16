<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;

/**
 * @property int $id
 * @property int|null $company_id
 * @property float|null $amount
 * @property string|null $responce
 * @property string|null $packet
 * @property string|null $billing_cycle_start
 * @property string|null $billing_cycle_end
 * @property string|null $reference_number
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 */
interface ILicenceTransaction
{
}
