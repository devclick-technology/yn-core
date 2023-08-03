<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IClientApiKey;

class ClientApiKey extends Model implements IClientApiKey
{
    protected $table = 'client_api_keys';

    protected $fillable = [
        'company_id', 'api_key',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
