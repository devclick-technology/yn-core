<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IFileUploadHistory;

class FileUploadHistory extends BaseModel implements IFileUploadHistory
{

    public function totalProcessed()
    {
        return $this->processed_count + $this->failed_count;
    }

    public function failed_consumers()
    {
        return $this->hasMany(FailedFileUploadConsumer::class, 'file_upload_histories_id');
    }
}
