<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IFileUploadHistory;

class FileUploadHistory extends Model implements IFileUploadHistory
{
    protected $fillable = [
        'uploaded_by', 'filename', 'type', 'num_of_records', 'company_id', 'subclient_id', 'processed_count',
        'failed_count', 'status', 'cancel_transaction', 'cfpb_communication', 'created_by',
    ];
}
