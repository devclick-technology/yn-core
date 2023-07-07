<?php

namespace YouNegotiate\Models\Interfaces;

use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $payment_profile_id
 * @property string|null $stripe_payment_method_id
 * @property string|null $stripe_customer_id
 * @property string|null $stripe_response
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $consumer_id
 * @property int|null $is_schedule
 * @property int|null $updated
 */

interface IStripePaymentDetail
{
}