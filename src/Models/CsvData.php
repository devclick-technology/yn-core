<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICsvData;

class CsvData extends Model implements ICsvData
{
    protected $table = 'csv_data';

    protected $fillable = ['company_id', 'csv_filename', 'csv_header', 'csv_data', 'subclient_id'];
}
