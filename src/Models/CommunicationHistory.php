<?php

namespace YouNegotiate\Models;

use YouNegotiate\Models\Interfaces\ICommunicationHistory;

class CommunicationHistory extends BaseModel implements ICommunicationHistory
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function consumer()
    {
        return $this->belongsTo(Consumer::class)->withDefault(['full_name' => '']);
    }

    public function group()
    {
        return $this->belongsTo(Group::class)->withDefault(['name' => '']);
    }

    public function template()
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
