<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;

class ElettersConsumersMap extends Model
{
    protected $table = 'eletters_consumers_map';

    protected $fillable = [
        'read_by_consumer',
    ];

    public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }

    public function eletter()
    {
        return $this->belongsTo(Template::class, 'eletters_id', 'id');
    }
}