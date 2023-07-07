<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICreditorAutomation;

class CreditorAutomation extends Model implements ICreditorAutomation
{
    protected $table = 'creditor_automations';
}
