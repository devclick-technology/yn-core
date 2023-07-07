<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICsvHeader;

class CsvHeader extends Model implements ICsvHeader
{
    protected $fillable = ['company_id', 'saved_headers', 'subclient_id'];
}
