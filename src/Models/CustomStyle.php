<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use YouNegotiate\Models\Interfaces\ICustomStyle;

class CustomStyle extends Model implements ICustomStyle
{
    protected $fillable = [
        'company_id', 'logo_path', 'bg_color', 'button_color', 'font_color',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
