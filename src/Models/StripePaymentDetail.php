<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IStripePaymentDetail;

class StripePaymentDetail extends BaseModel implements IStripePaymentDetail
{
    Use SoftDeletes;

    protected $table = 'stripe_payment_detail';
}
