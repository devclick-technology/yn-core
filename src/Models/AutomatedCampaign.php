<?php

namespace YouNegotiate\Models;

use App\Jobs\RunAutomatedCampaignJob;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IAutomatedCampaign;

class AutomatedCampaign extends BaseModel implements IAutomatedCampaign
{
    use SoftDeletes;

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected $table = 'automated_campaigns';

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function emailTemplate()
    {
        return $this->belongsTo(AutomatedTemplate::class, 'email_temp_id');
    }

    public function smsTemplate()
    {
        return $this->belongsTo(AutomatedTemplate::class, 'sms_temp_id');
    }

    public function communicationStatus()
    {
        return $this->belongsTo(CommunicationStatus::class, 'comm_status_id');
    }

    public function run()
    {
        $this->sent_at = now();
        $this->group_member_count = Consumer::where('company_id', $this->company_id)->where('communication_status_code', $this->communicationStatus->status_code)->count();
        $this->save();

        RunAutomatedCampaignJob::dispatch($this);
        $message = '';
        if (isset($this->emailTemplate) && $this->emailTemplate->type == 'email') {
            $message .= 'Email';
        }
        if (! empty($message)) {
            $message .= ' AND ';
        }
        if (isset($this->smsTemplate) && $this->smsTemplate->type == 'sms') {
            $message .= 'SMS';
        }
        $message .= ' Template Sent to JOB!';

        return $message;
    }

    public function failedConsumersCount()
    {
        $consumers = [];
        $messages = [];
        $arr = null;

        foreach (explode(',', $this->failed_consumers) as $data) {
            $arr = explode('<>', $data);
            array_push($consumers, $arr[0]);
            if (count($arr) == 2) {
                array_push($messages, $arr[1]);
            } else {
                array_push($messages, '');
            }
        }

        return Consumer::whereIn('id', $consumers)->count();
    }
}