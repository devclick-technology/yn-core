<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\Consumer;

/**
 * @property int $id
 * @property int|null $user_id
 * @property string $ip_address
 * @property string $session_id
 * @property string $user_agent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $logged_out_at
 * @property string|null $company_id
 * @property string|null $consumer_id
 * @property string|null $sub_client1_id
 * @property string|null $sub_client2_id
 * @property string|null $event_title
 * @property string|null $event_desc
 * @property-read Company|null $company
 * @property-read Consumer|null $consumer
 */
interface IConsumerActivity
{
}
