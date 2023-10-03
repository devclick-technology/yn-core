<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\IDunningLaterSMSTemplate;

class DunningLaterSMSTemplate extends BaseModel implements IDunningLaterSMSTemplate
{
    protected $table = 'dunning_latter_sms_template';
}
