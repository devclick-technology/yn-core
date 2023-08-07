<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICustomContent;

class CustomContent extends BaseModel implements ICustomContent
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subclient()
    {
        return $this->belongsTo(Subclient::class)->withDefault(['name' => '']);
    }
}
