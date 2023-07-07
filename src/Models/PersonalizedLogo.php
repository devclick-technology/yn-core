<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\IPersonalizedLogo;

class PersonalizedLogo extends Model implements IPersonalizedLogo
{
    protected $fillable = ['company_id', 'primary_color', 'secondary_color', 'background_color', 'customer_communication_link', 'logo_name'];
}
