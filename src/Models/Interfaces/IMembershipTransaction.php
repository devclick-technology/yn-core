<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Membership;

/**
 * @property int $id
 * @property string $status
 * @property float $price
 * @property Json|null $response
 * @property string|null $tilled_transaction_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $company
 * @property-read Membership|null $membership
 */
interface IMembershipTransaction
{
}
