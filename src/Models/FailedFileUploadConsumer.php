<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IFailedFileUploadConsumer;

class FailedFileUploadConsumer extends Model implements IFailedFileUploadConsumer
{
    protected $table = 'failed_file_upload_consumers';

    protected $fillable = [
        'file_upload_histories_id', 'row', 'reason',
    ];
}
