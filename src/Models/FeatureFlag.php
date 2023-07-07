<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IFeatureFlag;

class FeatureFlag extends Model implements IFeatureFlag
{
    protected $guarded = [];
}
