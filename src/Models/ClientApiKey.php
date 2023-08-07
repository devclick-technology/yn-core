<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IClientApiKey;

class ClientApiKey extends BaseModel implements IClientApiKey
{
    protected $table = 'client_api_keys';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
