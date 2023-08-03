<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\ICustomStyle;

class CustomStyle extends Model implements ICustomStyle
{
    protected $fillable = [
        'company_id', 'logo_path', 'bg_color', 'button_color', 'font_color',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
