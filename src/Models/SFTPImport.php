<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ISFTPImport;

class SFTPImport extends Model implements ISFTPImport
{
    protected $table = 'sftp_import_settings';
}
