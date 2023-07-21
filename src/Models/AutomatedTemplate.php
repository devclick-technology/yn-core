<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IAutomatedTemplate;

class AutomatedTemplate extends Model implements IAutomatedTemplate
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'created_by'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault(['name' => $this->created_by]);
    }

    public function automatedCampaign()
    {
        return $this->belongsTo(AutomatedCampaign::class);
    }

    public function emailTemplate()
    {
        return $this->hasOne(CommunicationStatus::class, 'aet_id');
    }

    public function smsTemplate()
    {
        return $this->hasOne(CommunicationStatus::class, 'ast_id');
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->created_by = auth()->user()->id;
        });
        self::deleting(function ($item) {
        });
    }
}
