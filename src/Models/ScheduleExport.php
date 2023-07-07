<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IScheduleExport;

class ScheduleExport extends Model implements IScheduleExport
{
    protected $table = 'schedule_export';

    protected $guarded = [];
}
