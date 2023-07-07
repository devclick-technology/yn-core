<?php

namespace YouNegotiate\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait CreatedByTrait
{
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by', 'id');
    }
}
