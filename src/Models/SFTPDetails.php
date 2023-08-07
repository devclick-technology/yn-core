<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ISFTPDetails;

class SFTPDetails extends BaseModel implements ISFTPDetails
{
    protected $table = 'sftp_details';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->company_id = auth()->user()->company_id;
        });
    }
}
