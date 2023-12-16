<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $first_name
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property int|null $zip
 * @property string|null $mobile
 * @property string|null $landline
 * @property string|null $email
 * @property int $text_permission
 * @property int $email_permission
 * @property int $mobile_call_permission
 * @property int $landline_call_permission
 * @property int $usps_permission
 * @property string|null $email
 * @property string|null $image
 * @property string|null $username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
interface IConsumerProfile
{
}
