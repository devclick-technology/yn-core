<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IStripePaymentDetail;

class StripePaymentDetail extends Model implements IStripePaymentDetail
{
    protected $table = 'stripe_payment_detail';
}
