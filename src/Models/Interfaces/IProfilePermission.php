<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $first_name
 * @property string|null $address1
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $email1
 * @property string|null $mobile1
 * @property string|null $last_name
 * @property string|null $dob
 * @property string|null $last4ssn
 * @property string|null $state
 * @property string|null $land1
 * @property string|null $text_permission
 * @property string|null $email_permission
 * @property string|null $lanline_call_permission
 * @property string|null $mobile_call_permission
 * @property string|null $usps_permission
 * @property string|null $password
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $consumer_login_id
 * @property int|null $company_id
 * @property string|null $text_permission_input
 * @property string|null $email_permission_input
 * @property string|null $mobile_call_permission_input
 * @property string|null $lanline_call_permission_input
 * @property string|null $usps_permission_input
 */
interface IProfilePermission
{
}
