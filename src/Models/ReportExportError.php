<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IReportExportError;

class ReportExportError extends Model implements IReportExportError
{
    protected $table = 'export_reort_error';
}
