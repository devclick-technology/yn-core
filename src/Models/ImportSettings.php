<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IImportSettings;

class ImportSettings extends BaseModel implements IImportSettings
{
    protected $table = 'sftp_import_settings';
}
