<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IConsumerPersonalizedLogo;

class ConsumerPersonalizedLogo extends BaseModel implements IConsumerPersonalizedLogo
{
    protected $table = 'consumer_personalized_logos';

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }
}
