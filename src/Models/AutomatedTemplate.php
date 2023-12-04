<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Enums\AutomatedTemplateType;

class AutomatedTemplate extends Model
{
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function automatedCampaign(): BelongsTo
    {
        return $this->belongsTo(AutomatedCampaign::class);
    }

    public function emailTemplate(): HasOne
    {
        return $this->hasOne(CommunicationStatus::class, 'automated_email_template_id');
    }

    public function smsTemplate(): HasOne
    {
        return $this->hasOne(CommunicationStatus::class, 'automated_sms_template_id');
    }

    public function getType()
    {
        $type = '';
        switch (strtolower($this->type)) {
            case 'email':
                $type = 'Email';
                break;
            case 'sms':
                $type = 'SMS';
                break;
            default:
                break;
        }

        return $type;
    }
}
