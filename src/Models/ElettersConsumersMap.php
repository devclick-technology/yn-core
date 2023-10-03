<?php

namespace YouNegotiate\Models;

class ElettersConsumersMap extends BaseModel
{
    protected $table = 'eletters_consumers_map';

    public function consumer()
    {
        return $this->belongsTo(Consumer::class);
    }

    public function eletter()
    {
        return $this->belongsTo(Template::class, 'eletters_id', 'id');
    }
}