<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ElettersConsumersMap extends Model
{
    protected $table = 'eletters_consumers_map';

    protected $fillable = [
        'read_by_consumer',
    ];

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class);
    }

    public function eletter(): BelongsTo
    {
        return $this->belongsTo(Template::class, 'eletters_id', 'id');
    }
}