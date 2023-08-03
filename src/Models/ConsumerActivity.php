<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Traits\CompanyIDTrait;
use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IConsumerActivity;

class ConsumerActivity extends Model implements IConsumerActivity
{
    use CompanyIDTrait;

    protected $fillable = [
        'user_id',
        'ip_address',
        'session_id',
        'user_agent',
        'logged_out_at',
        'company_id',
        'consumer_id',
        'sub_client1_id',
        'sub_client2_id',
        'event_title',
        'event_desc',
    ];

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }
}
