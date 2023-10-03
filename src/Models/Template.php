<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ITemplate;
use App\Models\User;

class Template extends BaseModel implements ITemplate
{
    use SoftDeletes;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault(['name' => $this->created_by]);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function getType()
    {
        $type = '';
        switch (strtolower($this->type)) {
            case 'email':
                $type = 'Email';
                break;
            case 'sms':
                $type = 'SMS';
                break;
            default:
                break;
        }

        return $type;
    }

    public function company_name()
    {
        $company = Company::find($this->company_id);
        if ($company) {
            return $company->company_name;
        }

        return '-';
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->company_id = auth()->user()->company_id;
            $item->created_by = auth()->user()->id;
        });
        self::deleting(function ($item) {
            $item->campaigns()->delete();
        });
    }
}
