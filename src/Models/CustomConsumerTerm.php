<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ICustomConsumerTerm;

class CustomConsumerTerm extends BaseModel implements ICustomConsumerTerm
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
