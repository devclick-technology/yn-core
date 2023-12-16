<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $session_id
 * @property string|null $consumer_token
 * @property int $email_verified
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $dob
 * @property string|null $last_4_ssn
 */
interface IConsumerLogin
{
}
