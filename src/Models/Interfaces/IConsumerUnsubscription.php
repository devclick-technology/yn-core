<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Consumer;

/**
 * @property int $id
 * @property int|null $consumer_id
 * @property int|null $company_id
 * @property string|null $email
 * @property int|null $phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Company|null $Company
 * @property-read Consumer|null $Consumer
 */
interface IConsumerUnsubscription
{
}
