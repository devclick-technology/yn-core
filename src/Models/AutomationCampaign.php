<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use YouNegotiate\Enums\AutomationCampaignFrequency;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AutomationCampaign extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'communication_status_id',
        'frequency',
        'weekly',
        'hourly',
        'enabled',
        'start_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'frequency' => AutomationCampaignFrequency::class,
        'enabled' => 'boolean',
    ];

    public function startAt(): Attribute
    {
        return Attribute::make(get: fn ($value) => Carbon::parse($value));
    }

    public function communicationStatus(): BelongsTo
    {
        return $this->belongsTo(CommunicationStatus::class);
    }

    public function automatedCommunicationHistories(): HasMany
    {
        return $this->hasMany(AutomatedCommunicationHistory::class);
    }
}
