<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IClientApiKey;

class ClientApiKey extends Model implements IClientApiKey
{
    protected $table = 'client_api_keys';

    protected $fillable = [
        'company_id', 'api_key',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
