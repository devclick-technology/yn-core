<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\IGroup;
use YouNegotiate\Traits\CompanyIDTrait;
use YouNegotiate\Traits\CreatedByTrait;

class Group extends BaseModel implements IGroup
{
    use CompanyIDTrait;
    use CreatedByTrait;
    use SoftDeletes;

    public function formQuery($query, $field_name, $value_start, $value_end)
    {
        if (empty($value_end)) {
            $query = $query->where($field_name, 'like', '%' . $value_start . '%');
        } else {
            $query = $query->whereBetween($field_name, [$value_start, $value_end]);
        }

        return $query;
    }

    public function membersQuery($company_id)
    {
        $customer_status_array = json_decode($this->customer_status_rule);
        $customer_custom_rule_obj = json_decode($this->customer_custom_rule);
        if ($customer_status_array == null) {
            $customer_status_array = [];
        }
        if ($customer_custom_rule_obj == null) {
            $customer_custom_rule_obj = [];
        }
        if (count($customer_status_array) == 0 && count($customer_custom_rule_obj) == 0) {
            return collect([]);
        }
        $query = Consumer::where('status', '!=', 'deactivated');

        if ($company_id != '') {
            $query->where('company_id', $company_id);
        }
        if (count($customer_status_array) != 10) {
            if (($key = array_search('not_active_in_last_30_days', $customer_status_array)) !== false) {
                $query = $query->whereNotBetween('last_login_at', [now()->subDays(30), now()]);
                unset($customer_status_array[$key]);
            }
            if (($key = array_search('offer_accepted_but_no_payment_profile', $customer_status_array)) !== false) {
                $query = $query->where('offer_accepted', 1)->where('payment_setup', 0);
                unset($customer_status_array[$key]);
            }
            if (($key = array_search('open_negotiation', $customer_status_array)) !== false) {
                $query = $query->where('custom_offer', 1)->where('offer_accepted', 0);
            }

            if (($key = array_search('failed_payment', $customer_status_array)) !== false) {
                $query = $query->where('has_failed_payment', 1);
            }

            if (($key = array_search('failed_multiple', $customer_status_array)) !== false) {
                $query = $query->whereHas('scheduledTransactions', function ($query) {
                    $query->where('status', 'failed');
                }, '>', 1);
            }

            if (($key = array_search('counter_offer_provided', $customer_status_array)) !== false) {
                $query = $query->where('counter_offer', 1);
            }

            if (($key = array_search('only_sms_id', $customer_status_array)) !== false) {
                $query = $query->where('email1', null)->where('mobile1', '!=', null);
            }

            if (($key = array_search('only_email_id', $customer_status_array)) !== false) {
                $query = $query->where('mobile1', null)->where('email1', '!=', null);
            }
        }

        $actual_status_array = [];
        foreach ($customer_status_array as $status) {
            switch ($status) {
                case 'not_joined':
                    array_push($actual_status_array, 'uploaded');
                    break;
                case 'visited':
                    array_push($actual_status_array, 'visited');
                    break;
                case 'joined_but_no_action':
                    array_push($actual_status_array, 'joined');
                    break;
                case 'paid_in_full':
                    array_push($actual_status_array, 'paid_full');
                    break;
                case 'all_payment_made':
                    array_push($actual_status_array, 'settled');
                    break;
            }
        }
        if (count($actual_status_array) > 0) {
            if (count($actual_status_array) == 5) {
            } else {
                $query = $query->whereIn('status', $actual_status_array);
            }
        }
        if ($customer_custom_rule_obj) {
            foreach ($customer_custom_rule_obj as $key => $custom_rule) {
                switch ($custom_rule->field_name) {
                    case 'account_number':
                        $query = $this->formQuery($query, 'account_number', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'created_at':
                        $query = $this->formQuery($query, 'created_at', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'age':
                        $start_year = '-' . $custom_rule->value_start . ' years';
                        $end_year = '-' . $custom_rule->value_end . ' years';

                        $start_year = date('Y-m-d', strtotime($start_year));
                        $end_year = date('Y-m-d', strtotime($end_year));

                        $query = $query->whereBetween('dob', [$end_year, $start_year]);
                        break;
                    case 'gender':
                        $query = $query->where('gender', substr($custom_rule->value_start, 0, 1));
                        break;
                    case 'sub_client1_name':
                        $sub_client = Subclient::where('subclient_name', $custom_rule->value_start)->first();
                        if ($sub_client) {
                            $query = $query->where('sub_client1_id', $sub_client->id);
                        }
                        break;
                    case 'city':
                        $query = $this->formQuery($query, 'city', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'state':
                        $query = $this->formQuery($query, 'state', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'zip':
                        $query = $this->formQuery($query, 'zip', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'account_open_date':
                        $query = $this->formQuery($query, 'account_open_date', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'placement_date':
                        $query = $this->formQuery($query, 'placement_date', $custom_rule->value_start, $custom_rule->value_end);
                        break;
                    case 'deadline_date':
                        $start_year = date('Y-m-d', strtotime($custom_rule->value_start));
                        $end_year = date('Y-m-d', strtotime($custom_rule->value_end));

                        $query = $this->formQuery($query, 'expiry_date', $start_year, $end_year);
                        break;
                    case 'min_balance':
                        $query = $query->where('current_balance', '>', intval($custom_rule->value_start));
                        break;
                    case 'max_balance':
                        $query = $query->where('current_balance', '<', intval($custom_rule->value_start));
                        break;
                    case 'sub_client1_id':
                        if ($key == 0) {
                            $query = $query->where('sub_client1_id', intval($custom_rule->value_start));
                        } else {
                            $query = $query->orwhere('sub_client1_id', intval($custom_rule->value_start));
                        }

                        break;
                    case 'failed_list':
                        $query->whereIn('account_number', $custom_rule->value_start);
                        break;
                    case 'cfpb_account_number':
                        $query->whereIn('account_number', explode(',', $custom_rule->value_start));
                        break;
                    default:
                        break;
                }
            }
        }

        return $query;
    }

    public function members($company_id = null)
    {
        return $this->membersQuery($company_id ?? auth()->user()->company_id ?? 0)->get();
    }

    public function getMemberIDs($company_id = null)
    {
        return $this->membersQuery($company_id ?? auth()->user()->company_id ?? 0)->selectRaw('id')->get();
    }

    public function getMemberCountAttribute($company_id = null)
    {
        return $this->membersQuery($company_id ?? auth()->user()->company_id ?? 0)->selectRaw('count(*) as count')->first()->count;
    }

    public function getTotalBalanceAttribute($company_id = null)
    {
        return $this->membersQuery($company_id ?? auth()->user()->company_id ?? 0)->selectRaw('sum(current_balance) as total_balance')->first()->total_balance;
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function superAdminMembers($company_id = null, $subclient_id = null)
    {
        $company_id = $company_id ?? auth()->user()->company_id;
        $subclient_id = $subclient_id ?? auth()->user()->subclient_id ?? null;

        return $this->membersQuery($company_id, $subclient_id)->get();
    }

    public function memberCount($company_id = null)
    {
        return $this->membersQuery($company_id, null)->count();
    }

    public function totalBalance($company_id = null)
    {
        return $this->membersQuery($company_id, null)->selectRaw('sum(current_balance) as total_balance')->first()->total_balance;
    }

    public function company_name()
    {
        $company = Company::find($this->company_id);
        if ($company) {
            return $company->company_name;
        }

        return '-';
    }

    public function allMembers($company_id = null)
    {
        return $this->membersQuery($company_id, null)->get();
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function ($group) {
            if (isset(auth()->user()->company_id)) {
                $group->company_id = auth()->user()->company_id;
                $group->created_by = auth()->user()->id;
            }
        });
        self::deleting(function ($group) {
            $group->campaigns()->delete();
        });
    }
}
