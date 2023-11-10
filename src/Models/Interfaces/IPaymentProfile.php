<?php

namespace YouNegotiate\Models\Interfaces;

use BackedEnum;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $company_id
 * @property int|null $consumer_login_id
 * @property int|null $consumer_id
 * @property int|null $subclient1_id
 * @property int|null $subclient2_id
 * @property string|BackedEnum $method
 * @property string|null $last4digit
 * @property string|null $expirity
 * @property string|null $gateway_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $account_number
 * @property string|null $routing_number
 * @property string|null $profile_id
 * @property string|null $payment_profile_id
 * @property string|null $shipping_profile_id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $gateway_type
 * @property int|null $merchant_id
 * @property string|null $stripe_payment_method_id
 * @property string|null $stripe_customer_id
 * @property Merchant|null $merchant_cc
 * @property Merchant|null $merchant_ach
 */

interface IPaymentProfile
{
}
