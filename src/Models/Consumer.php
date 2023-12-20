<?php

declare(strict_types=1);

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Throwable;
use YouNegotiate\Models\Interfaces\IConsumer;

class Consumer extends BaseModel implements IConsumer
{
    use HasFactory;
    use Notifiable;

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function subclientOne(): BelongsTo
    {
        return $this->belongsTo(Subclient::class, 'sub_client1_id');
    }

    public function subclientTwo(): BelongsTo
    {
        return $this->belongsTo(Subclient::class, 'sub_client2_id');
    }

    public function consumerProfile(): BelongsTo
    {
        return $this->belongsTo(ConsumerProfile::class);
    }

    public function subclient2()
    {
        return $this->belongsTo(Subclient::class, 'sub_client2_id');
    }

    public function subclient1()
    {
        return $this->belongsTo(Subclient::class, 'sub_client1_id');
    }

    public function paymentProfile()
    {
        return $this->hasOne(PaymentProfile::class, 'consumer_id');
    }

    public function consumer_negotiation(): HasOne
    {
        return $this->hasOne(ConsumerNegotiation::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ($this->middle_name ? ' ' . $this->middle_name : '') . ' ' . $this->last_name;
    }

    public function getCompanyName()
    {
        $companyName = $this->company->company_name;

        if ($this->sub_client2_id) {
            $subclient2 = Subclient::find($this->sub_client2_id);
            $companyName = $subclient2->subclient_name;
        } elseif ($this->sub_client2_name) {
            $companyName = $this->sub_client2_name;
        } elseif ($this->sub_client1_id) {
            $subclient1 = Subclient::find($this->sub_client1_id);
            $companyName = $subclient1->subclient_name;
        } elseif ($this->sub_client1_name) {
            $companyName = $this->sub_client1_name;
        }

        return $companyName;
    }

    public function getSubClientName()
    {
        $companyName = '';

        if ($this->sub_client2_id) {
            $subclient2 = Subclient::find($this->sub_client2_id);
            $companyName = $subclient2->subclient_name;
        } elseif ($this->sub_client2_name) {
            $companyName = $this->sub_client2_name;
        } elseif ($this->sub_client1_id) {
            $subclient1 = Subclient::find($this->sub_client1_id);
            $companyName = $subclient1->subclient_name;
        } elseif ($this->sub_client1_name) {
            $companyName = $this->sub_client1_name;
        }

        return $companyName;
    }

    public function getCompanyEmail()
    {
        // if($this->sub_client2_id){
        //     $subclient2 = Subclient::find($this->sub_client2_id);
        //     $companyEmail = $subclient2->billing_email;
        // }
        // elseif($this->sub_client1_id){
        //     $subclient1 = Subclient::find($this->sub_client1_id);
        //     $companyEmail = $subclient1->billing_email;
        // }
        // else{
        //     $companyEmail = $this->company->billing_email;
        // }

        $companyEmail = $this->company->billing_email;

        return $companyEmail;
    }

    public function getCompanyPhone()
    {
        if ($this->sub_client2_id) {
            $subclient2 = Subclient::find($this->sub_client2_id);
            $companyPhone = $subclient2->billing_phone;
        } elseif ($this->sub_client1_id) {
            $subclient1 = Subclient::find($this->sub_client1_id);
            $companyPhone = $subclient1->billing_phone;
        } else {
            $companyPhone = $this->company->billing_phone;
        }

        return $companyPhone;
    }

    public function getCompanyAboutUs()
    {
        $companyAboutUs = CustomContent::where('company_id', $this->company_id)->where('title', 'about-us')->first();
        if (isset($companyAboutUs['content'])) {
            return $companyAboutUs['content'];
        }

        return '';
    }

    public function getContactName()
    {
        if ($this->sub_client2_id) {
            $subclient2 = Subclient::find($this->sub_client2_id);
            $account_holder_name = $subclient2->account_holder_name;
        } elseif ($this->sub_client1_id) {
            $subclient1 = Subclient::find($this->sub_client1_id);
            $account_holder_name = $subclient1->account_holder_name;
        } else {
            $account_holder_name = $this->company->account_holder_name;
        }

        return $account_holder_name;
    }

    public function getMerchant($type = null)
    {
        if ($this->sub_client2_id) {
            $select_merchant = Merchant::query()
                ->join('subclients', 'merchants.subclient_id', 'subclients.id')
                ->where('subclient_id', $this->sub_client2_id)
                ->where('subclients.default_payment_account', 1)
                ->when($type, fn ($q) => $q->where('merchant_type', $type))
                ->select('merchants.*')
                ->first();
            if (! $select_merchant) {
                $select_merchant = Merchant::query()
                    ->join('subclients', 'merchants.subclient_id', 'subclients.id')
                    ->where('subclient_id', $this->sub_client1_id)
                    ->where('subclients.default_payment_account', 1)
                    ->select('merchants.*')
                    ->when($type, fn ($q) => $q->where('merchant_type', $type))
                    ->first();

                if (! $select_merchant) {
                    $select_merchant = Merchant::query()
                        ->where('company_id', $this->company_id)
                        ->whereNull('subclient_id')
                        ->when($type, fn ($q) => $q->where('merchant_type', $type))
                        ->first();
                }
            }
        } elseif ($this->sub_client1_id) {
            $select_merchant = Merchant::query()
                ->join('subclients', 'merchants.subclient_id', 'subclients.id')
                ->where('subclient_id', $this->sub_client1_id)
                ->where('subclients.default_payment_account', 1)
                ->select('merchants.*')
                ->when($type, fn ($q) => $q->where('merchant_type', $type))
                ->first();

            if (! $select_merchant) {
                $select_merchant = Merchant::query()
                    ->where('company_id', $this->company_id)
                    ->whereNull('subclient_id')
                    ->when($type, fn ($q) => $q->where('merchant_type', $type))
                    ->first();
            }
        } elseif ($this->company_id) {
            $select_merchant = Merchant::query()
                ->where('company_id', $this->company_id)
                ->whereNull('subclient_id')
                ->when($type, fn ($q) => $q->where('merchant_type', $type))
                ->first();
        }

        return $select_merchant ?? null;
    }

    public function getccMerchant()
    {
        return $this->getMerchant('cc');
    }

    public function getachMerchant()
    {
        return $this->getMerchant('ach');
    }

    public function getActualSubclient1Name()
    {
        $name = '';
        if ($this->sub_client1_name != null) {
            $name = $this->sub_client1_name;
        } elseif ($this->sub_client1_id != null) {
            $name = $this->subclient1->name;
        } else {
            $name = '-';
        }

        return $name;
    }

    public function getActualSubclient2Name()
    {
        $name = '';
        if ($this->sub_client2_name != null) {
            $name = $this->sub_client2_name;
        } elseif ($this->sub_client2_id != null) {
            $name = $this->subclient2->name;
        } else {
            $name = '-';
        }

        return $name;
    }

    public function actualPSD()
    {
        $pay_setup_discount_percent = null;
        if ($this->pay_setup_discount_percent != null) {
            $pay_setup_discount_percent = $this->pay_setup_discount_percent;
        } else {
            if ($this->sub_client2_id != null) {
                if ($this->subclient2->ppa_balance_discount_percent) {
                    $pay_setup_discount_percent = $this->subclient2->ppa_balance_discount_percent;
                } elseif ($this->subclient1->ppa_balance_discount_percent) {
                    $pay_setup_discount_percent = $this->subclient1->ppa_balance_discount_percent;
                } else {
                    $pay_setup_discount_percent = $this->company->ppa_balance_discount_percent;
                }
            } elseif ($this->sub_client1_id != null) {
                if ($this->subclient1->ppa_balance_discount_percent) {
                    $pay_setup_discount_percent = $this->subclient1->ppa_balance_discount_percent;
                } else {
                    $pay_setup_discount_percent = $this->company->ppa_balance_discount_percent;
                }
            } else {
                $pay_setup_discount_percent = $this->company->ppa_balance_discount_percent;
            }
        }

        return $pay_setup_discount_percent;
    }

    public function actualPIF()
    {
        $pif_discount_percent = null;
        if ($this->pif_discount_percent != null) {
            $pif_discount_percent = $this->pif_discount_percent;
        } else {
            if ($this->sub_client2_id != null) {
                if ($this->subclient2->pif_balance_discount_percent) {
                    $pif_discount_percent = $this->subclient2->pif_balance_discount_percent;
                } elseif ($this->subclient1->pif_balance_discount_percent) {
                    $pif_discount_percent = $this->subclient1->pif_balance_discount_percent;
                } else {
                    $pif_discount_percent = $this->company->pif_balance_discount_percent;
                }
            } elseif ($this->sub_client1_id != null) {
                if ($this->subclient1->pif_balance_discount_percent) {
                    $pif_discount_percent = $this->subclient1->pif_balance_discount_percent;
                } else {
                    $pif_discount_percent = $this->company->pif_balance_discount_percent;
                }
            } else {
                $pif_discount_percent = $this->company->pif_balance_discount_percent;
            }
        }

        return $pif_discount_percent;
    }

    public function actualPSDamount()
    {
        $actualPSDamount = null;

        if ($this->ppa_amount) {
            $actualPSDamount = $this->ppa_amount;
        } else {
            $actualPSDamount = $this->current_balance - ($this->current_balance * $this->actualPSD() / 100);
        }

        return $actualPSDamount;
    }

    public function actualPIFamount()
    {
        $actualPIFamount = null;

        if ($this->pif_discount_balance) {
            $actualPIFamount = $this->pif_discount_balance;
        } else {
            $actualPIFamount = $this->current_balance - ($this->current_balance * $this->actualPIF() / 100);
        }

        return $actualPIFamount;
    }

    /*
        public function actualMonthlyAmount()
        {
            $actualMonthlyAmount = null;

            if ($this->min_monthly_pay_amount) {
                $actualMonthlyAmount = $this->min_monthly_pay_amount;
            } else {
                $actualMonthlyAmount = $this->actualPIFamount() * $this->actualMonthlyPercent() / 100;
            }

            return $actualMonthlyAmount;
        }
    */
    public function actualMaxDaysFirstPay()
    {
        $max_days_first_pay = null;
        if ($this->max_days_first_pay != null) {
            $max_days_first_pay = $this->max_days_first_pay;
        } else {
            if ($this->sub_client2_id != null) {
                if ($this->subclient2->max_days_first_pay) {
                    $max_days_first_pay = $this->subclient2->max_days_first_pay;
                } elseif ($this->subclient1->max_days_first_pay) {
                    $max_days_first_pay = $this->subclient1->max_days_first_pay;
                } else {
                    $max_days_first_pay = $this->company->max_days_first_pay;
                }
            } elseif ($this->sub_client1_id != null) {
                if ($this->subclient1->max_days_first_pay) {
                    $max_days_first_pay = $this->subclient1->max_days_first_pay;
                } else {
                    $max_days_first_pay = $this->company->max_days_first_pay;
                }
            } else {
                $max_days_first_pay = $this->company->max_days_first_pay;
            }
        }

        return $max_days_first_pay;
    }

    public function get_terms_from_group($id)
    {
        $url = 'https://creditor.younegotiate.com/ajax/consumer-in-group/' . $id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }

    public function min_pay_in_full()
    {
        $consumer = $this;
        $customConsumerTerm = CustomConsumerTerm::where('company_id', $consumer->company->id)->get();
        $companyTerm = Company::where('id', $consumer->company->id)->get();
        $groupTerms = $this->get_terms_from_group($consumer->id);
        $discount = 0;

        //Find discounted price for final amount to pay
        if ($consumer->pif_discount_balance) {
            $min_pay_in_full = $consumer->pif_discount_balance;
        } elseif ($consumer->pif_discount_percent) {
            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $consumer->pif_discount_percent / 100);
        }
        // elseif($groupTerms != null){
        //     $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $groupTerms->pif_balance_discount_percent / 100);
        // }
        elseif (count($customConsumerTerm) > 0) {
            foreach ($customConsumerTerm as $term) {
                //custom_consumer_term option
                if ($term->term_type == 'gender') {
                    if ($term->term_value == $consumer->gender) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'age') {
                    if ($term->term_value == $consumer->age) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'state') {
                    if ($term->term_value == $consumer->state) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'zip') {
                    if ($term->term_value == $consumer->zip) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } else {
                    $discount = $companyTerm[0]->pif_balance_discount_percent; //Company discount if nothing satisfy
                    break;
                }
            }

            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $discount / 100);
        } else {
            if ($consumer->sub_client2_id) {
                if ($consumer->subclient2->pif_balance_discount_percent) {
                    $discount = $consumer->subclient2->pif_balance_discount_percent;
                } else {
                    $discount = $companyTerm[0]->pif_balance_discount_percent;
                }
            } elseif ($consumer->sub_client1_id) {
                if ($consumer->subclient1->pif_balance_discount_percent) {
                    $discount = $consumer->subclient1->pif_balance_discount_percent;
                } else {
                    $discount = $companyTerm[0]->pif_balance_discount_percent;
                }
            } else {
                $discount = $companyTerm[0]->pif_balance_discount_percent;
            }

            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $discount / 100);
        }

        return $min_pay_in_full;
    }

    public function custom_min_pay_in_full()
    {
        $consumer = $this;
        $customConsumerTerm = CustomConsumerTerm::where('company_id', $consumer->company->id)->get();
        $companyTerm = Company::where('id', $consumer->company->id)->get();
        $groupTerms = $this->get_terms_from_group($consumer->id);
        $discount = 0;

        //Find discounted price for final amount to pay
        if ($consumer->pif_discount_balance) {
            $min_pay_in_full = $consumer->pif_discount_balance;
        } elseif ($consumer->pif_discount_percent) {
            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $consumer->pif_discount_percent / 100);
        } elseif ($groupTerms != null) {
            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $groupTerms->pif_balance_discount_percent / 100);
        } elseif (count($customConsumerTerm) > 0) {
            foreach ($customConsumerTerm as $term) {
                //custom_consumer_term option
                if ($term->term_type == 'gender') {
                    if ($term->term_value == $consumer->gender) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'age') {
                    if ($term->term_value == $consumer->age) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'state') {
                    if ($term->term_value == $consumer->state) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } elseif ($term->term_type == 'zip') {
                    if ($term->term_value == $consumer->zip) {
                        $discount = $term->min_one_time_percent;
                        break;
                    }
                } else {
                    $discount = $companyTerm[0]->custom_pif_balance_discount_percent; //Company discount if nothing satisfy
                    break;
                }
            }

            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $discount / 100);
        } else {
            if ($consumer->sub_client2_id) {
                if ($consumer->subclient2->custom_pif_balance_discount_percent) {
                    $discount = $consumer->subclient2->custom_pif_balance_discount_percent;
                } else {
                    $discount = $companyTerm[0]->custom_pif_balance_discount_percent;
                }
            } elseif ($consumer->sub_client1_id) {
                if ($consumer->subclient1->custom_pif_balance_discount_percent) {
                    $discount = $consumer->subclient1->custom_pif_balance_discount_percent;
                } else {
                    $discount = $companyTerm[0]->custom_pif_balance_discount_percent;
                }
            } else {
                $discount = $companyTerm[0]->custom_pif_balance_discount_percent;
            }

            $min_pay_in_full = $consumer->current_balance - ($consumer->current_balance * $discount / 100);
        }

        return $min_pay_in_full;
    }

    public function shortLink(): string
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = $randomString2 = '';

        for ($i = 0; $i < 2; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $consumer_id = $this->id;
        $first = $randomString;

        for ($i = 0; $i < 2; $i++) {
            $randomString2 .= $characters[rand(0, $charactersLength - 1)];
        }
        $last = $randomString2;

        $short_tag = $first . $consumer_id . $last;

        return 'https://yneg.link/' . $short_tag;
    }

    public function saveInvitationLink(): void
    {
        $this->invitation_link = $this->shortLink();
        $this->save();
    }

    public function createLogin()
    {
        $password = Str::random(8);
        $cl = ConsumerLogin::create(['email' => $this->email, 'password' => $password]);
        $this->consumer_login_id = $cl->id;
        $this->save();

        return $password;
    }

    public function actualMonthlyPercent()
    {
        $min_monthly_pay_percent = null;
        if ($this->min_monthly_pay_percent != null) {
            $min_monthly_pay_percent = $this->min_monthly_pay_percent;
        } else {
            if ($this->sub_client2_id != null) {
                if ($this->subclient2->min_monthly_pay_percent) {
                    $min_monthly_pay_percent = $this->subclient2->min_monthly_pay_percent;
                } elseif ($this->subclient1->min_monthly_pay_percent) {
                    $min_monthly_pay_percent = $this->subclient1->min_monthly_pay_percent;
                } else {
                    $min_monthly_pay_percent = $this->company->min_monthly_pay_percent;
                }
            } elseif ($this->sub_client1_id != null) {
                if ($this->subclient1->min_monthly_pay_percent) {
                    $min_monthly_pay_percent = $this->subclient1->min_monthly_pay_percent;
                } else {
                    $min_monthly_pay_percent = $this->company->min_monthly_pay_percent;
                }
            } else {
                $min_monthly_pay_percent = $this->company->min_monthly_pay_percent;
            }
        }

        return $min_monthly_pay_percent;
    }

    public function actualMonthlyAmount()
    {
        $actualMonthlyAmount = null;

        if ($this->min_monthly_pay_amount) {
            $actualMonthlyAmount = $this->min_monthly_pay_amount;
        } else {
            $actualMonthlyAmount = $this->actualPSDamount() * $this->actualMonthlyPercent() / 100;
        }

        return $actualMonthlyAmount;
    }

    public function getMasterName()
    {
        $master = $this->company->name;

        if ($this->sub_client2_id != null) {
            $master = $this->subclient2->name;
        } elseif ($this->sub_client2_name != null) {
            $master = $this->sub_client2_name;
        } elseif ($this->sub_client1_id != null) {
            $master = $this->subclient1->name;
        } elseif ($this->sub_client1_name != null) {
            $master = $this->sub_client1_name;
        }

        return $master;
    }

    public function unsubscribeLink()
    {
        $pl = $this->company->personalized;

        return 'https://' . $pl->customer_communication_link . '.younegotiate.com/unsubscribe';
    }

    public function unsubscription()
    {
        return $this->hasOne(ConsumerUnsubscription::class);
    }

    public function scheduledTransactions()
    {
        return $this->hasMany(ScheduleTransaction::class);
    }

    public function emailSubscribed()
    {
        if ($this->unsubscription) {
            return $this->unsubscription->email == null;
        }

        return true;
    }

    public function smsSubscribed()
    {
        if ($this->unsubscription) {
            return $this->unsubscription->email == null;
        }

        return true;
    }

    public function subscribed()
    {
        $us = $this->unsubscription;
        if ($us) {
            return false;
        }

        return true;
    }

    public function unsubscribed()
    {
        return ! $this->subscribed();
    }

    public function getFromDetailsAttribute()
    {
        $details = [];

        if ($this->company->consumer_company_name != null) {
            $from_name = $this->company->consumer_company_name;
        } else {
            $from_name = $this->company->name;
        }

        $from_email = $this->company->billing_email;
        if ($this->sub_client1_id != null) {
            if ($this->subclient1->consumer_company_name != null) {
                $from_name = $this->subclient1->consumer_company_name;
            } elseif ($this->subclient1->name != null) {
                $from_name = $this->subclient1->name;
            }

            if ($this->subclient1->billing_email != null) {
                $from_email = $this->subclient1->billing_email;
            }
        }
        if ($this->sub_client2_id != null) {
            if ($this->subclient2->consumer_company_name != null) {
                $from_name = $this->subclient2->consumer_company_name;
            } elseif ($this->subclient2->name != null) {
                $from_name = $this->subclient2->name;
            }

            if ($this->subclient2->billing_email != null) {
                $from_email = $this->subclient2->billing_email;
            }
        }
        $details['from_name'] = $from_name;
        $details['from_email'] = 'help@younegotiate.com';

        return $details;
    }

    public function consumerNegotiation()
    {
        return ConsumerNegotiation::where('consumer_id', $this->id)->where('active_negotiation', 1)->first();
    }

    public function newConsumerNegotiation(): HasOne
    {
        return $this->hasOne(ConsumerNegotiation::class);
    }

    public function consumerActiveNegotiation(): HasOne
    {
        return $this->hasOne(ConsumerNegotiation::class, 'consumer_id')->where('active_negotiation', 1);
    }

    public function allConsumerNegotiation()
    {
        return $this->belongsTo(ConsumerNegotiation::class, 'id', 'consumer_id');
    }

    public function profileLink()
    {
        return url('consumer-profile', $this->id);
    }

    public function communication_status()
    {
        return $this->belongsTo(CommunicationStatus::class, 'communication_status_code', 'status_code');
    }

    public function consumerLogs()
    {
        return ConsumerLog::where('consumer_id', 'like', '%' . $this->id . '%')->latest()->get();
    }

    public function cfpb_consumer($fuh)
    {
        try {
            $group_result = Group::where('file_upload_history_id', $fuh->id)->where('cfpb_communication', 1)->first();
            if ($group_result) {
                $group = Group::find($group_result->id);
                $customer_custom_rule = json_decode($group->customer_custom_rule);
                $new_rule = [];
                foreach (json_decode($group->customer_custom_rule) as $row_grp) {
                    if ($row_grp->field_name == 'cfpb_account_number') {
                        $value_start = explode(',', $row_grp->value_start);
                        $value_start[] = $this->account_number;
                        $row_grp->value_start = implode(',', $value_start);
                    }
                    $new_rule[] = $row_grp;
                }
                $group->customer_custom_rule = json_encode($new_rule);
                $group->save();
            } else {
                $new_rule = [];
                $id = $this->account_number;
                $new_rule[] = [
                    'field_name' => 'cfpb_account_number',
                    'value_start' => "$id",
                    'value_end' => null,
                ];
                $group_name = $this->company->company_name . ' Template CFPB Reg F';
                $group = new Group;
                $group->company_id = $fuh->company_id;
                $group->name = $group_name;
                $group->customer_status_rule = '["all_consumers"]';
                $group->customer_custom_rule = json_encode($new_rule);
                $group->cfpb_communication = 1;
                $group->file_upload_history_id = $fuh->id;
                $group->created_by = $fuh->created_by;
                $group->save();
            }
        } catch (throwable $e) {
            dump($e);
        }
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email1;
    }

    public function consumerPersonalizedLogo(): HasOne
    {
        return $this->hasOne(ConsumerPersonalizedLogo::class);
    }
}
