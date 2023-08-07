<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IBulkEmail;

class BulkEmail extends BaseModel implements IBulkEmail
{
    use SoftDeletes;

    public function template()
    {
        return $this->belongsTo(Template::class, 'template_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function ($item) {
            $item->company_id = auth()->user()->company_id;
        });
    }
}
