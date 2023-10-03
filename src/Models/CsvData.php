<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ICsvData;

class CsvData extends BaseModel implements ICsvData
{
    protected $table = 'csv_data';
}
