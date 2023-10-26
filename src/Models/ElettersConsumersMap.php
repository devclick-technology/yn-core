<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElettersConsumersMap extends BaseModel
{
    protected $table = 'eletters_consumers_map';

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function eletter(): BelongsTo
    {
        return $this->belongsTo(Eletter::class, 'eletters_id');
    }
}