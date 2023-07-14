<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ISFTPDetails;

class SFTPDetails extends Model implements ISFTPDetails
{
    protected $table = 'sftp_details';

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at', 'company_id'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->company_id = auth()->user()->company_id;
        });
    }
}
