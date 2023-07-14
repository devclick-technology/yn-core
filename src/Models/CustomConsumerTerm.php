<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICustomConsumerTerm;

class CustomConsumerTerm extends Model implements ICustomConsumerTerm
{
    protected $fillable = [
        'company_id', 'sub_client1_id', 'sub_client2_id', 'term_type', 'term_value', 'one_time_rule', 'min_one_time_percent', 'monthly_pay_percent', 'max_negotiation_discount_percent', 'pif_discount_percent', 'master_negotiation_rule',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
