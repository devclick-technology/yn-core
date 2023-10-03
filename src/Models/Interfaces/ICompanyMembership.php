<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Membership;

/**
 * @property int $id
 * @property-read Company $company
 * @property-read Membership $membership
 * @property string $status // enum: active, inactive
 * @property Carbon|null $current_plan_start
 * @property Carbon|null $current_plan_end
 * @property Carbon|null $cancelled_at
 */

interface ICompanyMembership
{

}