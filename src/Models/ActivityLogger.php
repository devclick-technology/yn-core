<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLogger extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'company_id',
        'user_id',
        'activity_message',
    ];
}
