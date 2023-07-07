<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IDunningLaterSMSTemplate;

class DunningLaterSMSTemplate extends Model implements IDunningLaterSMSTemplate
{
    protected $table = 'dunning_latter_sms_template';

    protected $fillable = [
        'content',
    ];
}
