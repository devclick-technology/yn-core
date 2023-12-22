<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;

class ClientLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'user_id',
        'consumer_id',
        'user_activity_message',
    ];
}
