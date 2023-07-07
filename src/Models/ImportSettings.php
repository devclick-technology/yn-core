<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IImportSettings;

class ImportSettings extends Model implements IImportSettings
{
    protected $table = 'sftp_import_settings';
}
