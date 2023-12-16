<?php

namespace YouNegotiate\Models\Interfaces;

use App\Models\Consumer;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $company_id
 * @property string|null $user_id
 * @property string|null $consumer_id
 * @property string|null $log_message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Consumer|null $consumer
 */
interface IConsumerLog
{
}
