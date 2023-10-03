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
 * @property int|null $mobile
 * @property int|null $landline
 * @property string|null $email
 * @property string|null $username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */

interface IConsumerProfile
{
}