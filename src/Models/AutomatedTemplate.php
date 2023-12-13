<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Enums\AutomatedTemplateType;
use YouNegotiate\Factories\AutomatedTemplateFactory;

class AutomatedTemplate extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'name', 'subject', 'type', 'content', 'enabled'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => AutomatedTemplateType::class,
        'enabled' => 'boolean',
    ];

    public function content(): Attribute
    {
        return Attribute::make(
            get: fn (?string $content): ?string => $content ? html_entity_decode($content) : null,
            set: fn (?string $content): ?string => $content ? htmlentities($content) : null
        );
    }

    public function automationCampaign(): HasMany
    {
        return $this->hasMany(AutomationCampaign::class);
    }

    public function emailTemplate(): HasOne
    {
        return $this->hasOne(CommunicationStatus::class, 'automated_email_template_id');
    }

    public function smsTemplate(): HasOne
    {
        return $this->hasOne(CommunicationStatus::class, 'automated_sms_template_id');
    }

    public function getType(): ?string
    {
        return match ($this->type->value) {
            'email' => (string) str($this->type->value)->title(),
            'sms' => (string) str($this->type->value)->upper(),
            default => null,
        };
    }

    /**
     * Create a new factory instance for the model.
     */
    public static function newFactory(): Factory
    {
        return AutomatedTemplateFactory::new();
    }
}
