<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IAutomatedTemplate;

class AutomatedTemplate extends Model implements IAutomatedTemplate
{
    use SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at', 'created_by'];
}
