<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IReportExportError;

class ReportExportError extends BaseModel implements IReportExportError
{
    protected $table = 'export_reort_error';
}
