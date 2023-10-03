<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ISFTPImport;

class SFTPImport extends BaseModel implements ISFTPImport
{
    protected $table = 'sftp_import_settings';
}
