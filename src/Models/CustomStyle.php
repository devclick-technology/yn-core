<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ICustomStyle;

class CustomStyle extends BaseModel implements ICustomStyle
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
