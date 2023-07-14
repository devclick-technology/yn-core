<?php

namespace YouNegotiate\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IScheduleExport;

class ScheduleExport extends Model implements IScheduleExport
{
    protected $table = 'schedule_export';

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function subclient()
    {
        return $this->belongsTo(Subclient::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
