<?php

namespace YouNegotiate\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ICompany;

class Company extends BaseModel implements ICompany
{
    use SoftDeletes, HasFactory;

    public function terms_condition()
    {
        $terms_condition = CustomContent::where('company_id', $this->id)->where('title', 'terms-conditions')->select('content')->first();

        $content = '';
        if ($terms_condition) {
            $content = $terms_condition->content;
        }

        return $content;
    }

    public function registerAccountContact($user)
    {
        $this->billing_name = $user->name;
        $this->billing_email = $user->email;
        $this->save();

        return $this;
    }

    public function getNameAttribute()
    {
        return $this->company_name;
    }

    public function getTypeAttribute()
    {
        return 'Company';
    }

    public function subclients()
    {
        return $this->hasMany(Subclient::class, 'company_id', 'id');
    }

    public function parentCompany()
    {
        return $this->belongsTo(Company::class, 'parent_id', 'id');
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function Activetemplates()
    {
        return $this->hasMany(Template::class)->where('enabled', 1);
    }

    public function custom_style()
    {
        return $this->hasOne(CustomStyle::class);
    }

    public function companyTerm()
    {
        return $this->hasOne(CompanyTerm::class);
    }

    public function createCustomStyle()
    {
        return $this->custom_style()->create(['company_id' => $this->id] + config('app.company.default_style'));
    }

    public function consumers()
    {
        return $this->hasMany(Consumer::class);
    }

    public function custom_contents()
    {
        return $this->hasMany(CustomContent::class);
    }

    public function custom_consumer_terms()
    {
        return $this->hasMany(CustomConsumerTerm::class);
    }

    public function getActiveStatusAttribute()
    {
        return $this->trashed() ? 'Deleted' : 'Active';
    }

    public function sftpDetails()
    {
        return $this->hasOne(SFTPDetails::class);
    }

    public function apiKey()
    {
        return $this->hasOne(ClientApiKey::class);
    }

    public function user()
    {
        return $this->hasOne(User::class, 'company_id');
    }

    public function incompleteStep()
    {
        if ($this->status == 'complete') {
            return 'step-5';
        }
        if ($this->status == 'rejected') {
            return 'step-1';
        }

        $incomplete = null;
        foreach (config('app.company.profile_validation_rules') as $step => $field_rules) {
            $flag = true;
            $incomplete = $step;

            foreach ($field_rules as $field => $rules) {
                if ($field != 'merchant_name') {
                    if (str_contains($rules, 'required')) {
                        if (empty($this->{$field} && $field)) {
                            $flag = false;
                            break;
                        }
                    }
                }
            }
            if (! $flag) {
                break;
            }
        }

        return $incomplete;
    }

    public function doComplete()
    {
        if ($this->status == 'created' || $this->status == 'rejected') {
            $this->profile_completed_at = now();
            $this->status = 'complete';
            $this->save();
        }
    }

    public function complete()
    {
        return $this->status == 'complete';
    }

    public function setYouNegotiateUrl($url)
    {
        $this->younegotiate_url = $url;
        $this->save();
    }

    public function checkProfileComplete()
    {
        $flag = true;
        $validation_rules = [];
        foreach (config('app.company.profile_validation_rules') as $step => $field_rules) {
            $validation_rules += $field_rules;
        }
        foreach ($validation_rules as $field => $rules) {
            if ($field != 'merchant_name') {
                if (str_contains($rules, 'required')) {
                    if (empty($this->{$field})) {
                        $flag = false;
                        break;
                    }
                }
            }
        }

        return $flag;
    }

    public function merchant()
    {
        return $this->hasOne(Merchant::class)->where('subclient_id', null)->withDefault([
            'merchant_name' => '',
            'usaepay_key' => '',
            'usaepay_pin' => '',
            'authorize_login_id' => '',
            'authorize_transaction_key' => '',
            'authorize_key' => '',
            'paidyet_subdomain' => '',
            'paidyet_key' => '',

        ]);
    }

    public function merchantCC()
    {
        return $this->hasOne(Merchant::class)->where('subclient_id', null)->where('merchant_type', 'cc')->withDefault([
            'merchant_name' => '',
            'usaepay_key' => '',
            'usaepay_pin' => '',
            'authorize_login_id' => '',
            'authorize_transaction_key' => '',
            'authorize_key' => '',
            'paidyet_subdomain' => '',
            'paidyet_key' => '',

        ]);
    }

    public function merchantACH()
    {
        return $this->hasOne(Merchant::class)->where('subclient_id', null)->where('merchant_type', 'ach')->withDefault([
            'merchant_name' => '',
            'usaepay_key' => '',
            'usaepay_pin' => '',
            'authorize_login_id' => '',
            'authorize_transaction_key' => '',
            'authorize_key' => '',
            'paidyet_subdomain' => '',
            'paidyet_key' => '',

        ]);
    }

    // Superadmin functions

    public function rejected()
    {
        return $this->status == 'rejected';
    }

    public function approved()
    {
        return $this->status == 'approved';
    }

    public function config()
    {
        return $this->only(['id', 'rnn_id', 'contract_date', 'sms_rate', 'email_rate', 'eletter_rate', 'user_experience_rate', 'rnn_share', 'billing_schedule', 'licence_fees']);
    }

    public function approve()
    {
        if ($this->status == 'complete') {
            $this->approved_at = now();
            $this->approved_by = auth()->user()->id;
            $this->status = 'approved';
            $this->save();

            return true;
        }

        return false;
    }

    public function reject()
    {
        $this->profile_completed_at = null;
        $this->status = 'rejected';
        $this->save();
    }

    public function commissionRecipient()
    {
        return json_decode($this->send_commission);
    }

    public function personalizedLogo()
    {
        return $this->belongsTo(PersonalizedLogo::class, 'company_id', 'id');
    }

    public function fullYNURL()
    {
        return 'https://'.$this->younegotiate_url.'.younegotiate.com';
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'company_id', 'id');
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function communicationCount($type, $from, $to)
    {
        //        return CampaignRepository::filterCampaigns($this->id, $type, $from, $to)->sum('total_sent');
        $count = 0;
        if ($type == 'email') {
            $count = CommunicationHistory::where('company_id', $this->id)->where('template_type', 'email')->where('status', 'success')->whereRaw("date(created_at) between '$from' and '$to'")->count();
        }
        if ($type == 'sms') {
            $count = CommunicationHistory::where('company_id', $this->id)->where('template_type', 'sms')->where('status', 'success')->whereRaw("date(created_at) between '$from' and '$to'")->sum('smssegment');
        }

        return $count;
    }

    public function communicationTotalPhoneCount($from, $to)
    {
        $count = 0;

        $count = CommunicationHistory::where('company_id', $this->id)->where('template_type', 'sms')->where('status', 'success')->whereRaw("date(created_at) between '$from' and '$to'")->count();

        return $count;
    }

    public function communicationCharge($type, $from, $to)
    {
        return $this->{$type.'_rate'} * $this->communicationCount($type, $from, $to);
    }

    public function transactions($from, $to)
    {
        $transactions = $this->transaction()->where('rnn_share_pass', null)
            ->where('status', 'Successful')
            ->where('superadmin_process', 0)
            ->whereRaw("DATE(created_at) Between '$from' and '$to'")
            ->get();

        return $transactions;
    }

    public function transactionsSuperAdmin($from, $to)
    {
        $transactions = $this->transaction()->where('rnn_share_pass', null)
            ->where('status', 'Successful')
            ->where('superadmin_process', 1)
            ->whereRaw("DATE(created_at) Between '$from' and '$to'")
            ->get();

        return $transactions;
    }

    public function transactionCharge($from, $to)
    {
        return $this->transactions($from, $to)->sum('amount');
    }

    public function rnnShareAmount($from, $to)
    {
        return $this->transactions($from, $to)->sum('rnn_share_amount');
    }

    public function rnnShareAmountSuperadmin($from, $to)
    {
        return $this->transactionsSuperAdmin($from, $to)->sum('rnn_share_amount');
    }

    public function transactionSuperadminCharge($from, $to)
    {
        return $this->transactionsSuperAdmin($from, $to)->sum('amount');
    }

    public function personalized()
    {
        return $this->hasOne(PersonalizedLogo::class);
    }

    public function isMcNeil(): bool
    {
        return $this->id == config('app.company.mcneil_id');
    }

    public function membership(): HasOne
    {
        return $this->hasOne(CompanyMembership::class);
    }
}
