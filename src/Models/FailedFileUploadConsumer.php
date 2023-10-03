<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IFailedFileUploadConsumer;

class FailedFileUploadConsumer extends BaseModel implements IFailedFileUploadConsumer
{
    protected $table = 'failed_file_upload_consumers';
}
