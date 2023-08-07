<?php

namespace YouNegotiate\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\IScheduleExport;

class ScheduleExport extends BaseModel implements IScheduleExport
{
    protected $table = 'schedule_export';

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
