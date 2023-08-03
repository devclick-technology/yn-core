<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\ICustomContent;

class CustomContent extends Model implements ICustomContent
{
    protected $fillable = [
        'company_id', 'subclient_id', 'title', 'content',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function subclient(): BelongsTo
    {
        return $this->belongsTo(Subclient::class)->withDefault(['name' => '']);
    }
}
