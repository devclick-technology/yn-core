<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use YouNegotiate\Models\Interfaces\ICommunicationHistory;

class CommunicationHistory extends Model implements ICommunicationHistory
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function consumer(): BelongsTo
    {
        return $this->belongsTo(Consumer::class)->withDefault(['full_name' => '']);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class)->withDefault(['name' => '']);
    }

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class)->withDefault(['name' => '', 'type' => '']);
    }

    public function templateType()
    {
        $template_type = null;
        if ($this->template_type == null) {
            if ($this->template_id) {
                $template_type = $this->template->type;
            } elseif ($this->email != null) {
                $template_type = 'email';
            } else {
                $template_type = 'sms';
            }
        } else {
            $template_type = $this->template_type;
        }

        return $template_type;
    }
}
