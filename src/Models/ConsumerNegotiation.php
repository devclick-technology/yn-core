<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use YouNegotiate\Models\Interfaces\IConsumerNegotiation;

class ConsumerNegotiation extends BaseModel implements IConsumerNegotiation
{
    use HasFactory;

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function scheduleTransactions(): HasMany
    {
        return $this->hasMany(ScheduleTransaction::class, 'consumer_id', 'consumer_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'consumer_id', 'consumer_id');
    }
}
