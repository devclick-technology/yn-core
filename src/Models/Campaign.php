<?php

namespace YouNegotiate\Models;

use App\Jobs\RunCampaignJob;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSMSJob;
use App\Mail\TemplateEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use YouNegotiate\Traits\CompanyIDTrait;
use YouNegotiate\Traits\CreatedByTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICampaign;

class Campaign extends Model implements ICampaign
{
    use SoftDeletes, CompanyIDTrait, CreatedByTrait;

    protected $casts = [
        'sent_at' => 'datetime',
    ];

    protected $fillable = ['group_id', 'template_id'];

    public function template(): BelongsTo
    {
        return $this->belongsTo(Template::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function biling($type, $rate)
    {
        if ($type === 'sms') {
            $count = CommunicationHistory::where('campaign_id', $this->id)->where('status', 'success')->sum('smssegment');

            return number_format($count * $rate, 2, '.', '');
        } else {
            $count = CommunicationHistory::where('campaign_id', $this->id)->where('status', 'success')->count();

            return number_format($count * $rate, 2, '.', '');
        }
    }

    public function run()
    {
        $this->sent_at = now();
        $this->group_member_count = $this->group->memberCount($this->group->company_id);
        $this->save();
        RunCampaignJob::dispatch($this, auth()->user());
        if ($this->template->type == 'email') {
            $message = 'Email Template Sent to Group!';
        }

        if ($this->template->type == 'sms') {
            $message = 'SMS Template Sent to Group!';
        }

        return $message;
    }

    public function runBackup()
    {
        $consumers = $this->group->members();
        $template = $this->template;
        $company = auth()->user()->company;
        $this->group_member_count = $this->group->member_count;
        $failed_consumers = $message = '';

        foreach ($consumers as $consumer) {
            if ($template->type == 'email') {
                if ($consumer->email1 != null) {
                    if ($consumer->emailSubscribed()) {
                        Log::channel('communication_command')->info('Sending email to: '.$consumer->email1.' Campaign ID: '.$this->id);
                        $email = new TemplateEmail($template->content, $template->subject, $consumer, $company);
                        SendEmailJob::dispatch($email, trim($consumer->email1), $consumer, $this, '', 'email1');
                        $this->total_sent = $this->total_sent + 1;
                        $this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    } else {
                        Log::channel('communication_command')->error('Error: Sending email to: '.$consumer->email1.' Campaign ID: '.$this->id.' Reason: Unsubscribed');
                        $failed_consumers .= ($consumer->id.'<>Consumer has unsubscribed from receiving emails,');
                    }
                } else {
                    Log::channel('communication_command')->error('Error: Sending email to: '.$consumer->email1.' Campaign ID: '.$this->id.' Reason: Blank email');
                    $failed_consumers .= ($consumer->id.'<>Consumer does not have email address,');
                }

                if (isset($consumer->email2) && $consumer->email2 != '') {
                    if ($consumer->emailSubscribed()) {
                        Log::channel('communication_command')->info('Sending email to: '.$consumer->email2.' Campaign ID: '.$this->id);
                        $email = new TemplateEmail($template->content, $template->subject, $consumer, $company);
                        SendEmailJob::dispatch($email, trim($consumer->email2), $consumer, $this);
                        // $this->total_sent = $this->total_sent + 1;
                        // $this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    }
                }

                if (isset($consumer->co_signer_email) && $consumer->co_signer_email != '') {
                    if ($consumer->emailSubscribed()) {
                        Log::channel('communication_command')->info('Sending email to: '.$consumer->co_signer_email.' Campaign ID: '.$this->id);
                        $email = new TemplateEmail($template->content, $template->subject, $consumer, $company);
                        SendEmailJob::dispatch($email, trim($consumer->co_signer_email), $consumer, $this);
                        // $this->total_sent = $this->total_sent + 1;
                        // $this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    }
                }
                $message = 'Email Template Sent to Group!';
            }
            if ($template->type == 'sms') {
                if ($consumer->mobile1 != null) {
                    if ($consumer->smsSubscribed()) {
                        Log::channel('communication_command')->info('Sending sms to: '.$consumer->mobile1.' Campaign ID: '.$this->id);
                        SendSMSJob::dispatch($template->content, trim($consumer->mobile1), $consumer, $this, $company, '', 'mobile1');
                        $this->total_sent = $this->total_sent + 1;
                        $this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    } else {
                        Log::channel('communication_command')->error('Error: Sending sms to: '.$consumer->mobile1.' Campaign ID: '.$this->id.' Reason: Unsubscribed');
                        $failed_consumers .= ($consumer->id.'<>Consumer unsubscribed from receiving sms,');
                    }
                } else {
                    Log::channel('communication_command')->error('Error: Sending sms to: '.$consumer->mobile1.' Campaign ID: '.$this->id.' Reason: Blank Mobile No');
                    $failed_consumers .= ($consumer->id.'<>Consumer mobile number not present,');
                }

                if (isset($consumer->mobile2) && $consumer->mobile2 != null) {
                    if ($consumer->smsSubscribed()) {
                        Log::channel('communication_command')->info('Sending sms to: '.$consumer->mobile2.' Campaign ID: '.$this->id);
                        SendSMSJob::dispatch($template->content, trim($consumer->mobile2), $consumer, $this, $company);
                        $this->total_sent = $this->total_sent + 1;
                        //$this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    }
                }
                if (isset($consumer->co_signer_mobile) && $consumer->co_signer_mobile != null) {
                    if ($consumer->smsSubscribed()) {
                        Log::channel('communication_command')->info('Sending sms to: '.$consumer->co_signer_mobile.' Campaign ID: '.$this->id);
                        SendSMSJob::dispatch($template->content, trim($consumer->co_signer_mobile), $consumer, $this, $company);
                        $this->total_sent = $this->total_sent + 1;
                        //$this->total_balance_delivered = $this->total_balance_delivered + $consumer->current_balance;
                    }
                }
                $message = 'SMS Template Sent to Group!';
            }
        }
        $this->failed_consumers = trim($failed_consumers, ',');
        $this->sent_at = now();
        $this->save();

        return $message;
    }

    public function failedConsumers()
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
        $consumers = Consumer::whereIn('id', $consumers)->get();

        foreach ($consumers as $index => $consumer) {
            $consumer->failed_reason = $messages[$index];
        }

        return $consumers;
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

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            if (! empty(auth()->user())) {
                $item->company_id = auth()->user()->company_id;
                $item->created_by = auth()->user()->id;
            }
        });
    }
}
