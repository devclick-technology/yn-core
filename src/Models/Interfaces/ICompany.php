<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Campaign;
use YouNegotiate\Models\ClientApiKey;
use YouNegotiate\Models\CompanyTerm;
use YouNegotiate\Models\Consumer;
use YouNegotiate\Models\CustomConsumerTerm;
use YouNegotiate\Models\CustomContent;
use YouNegotiate\Models\CustomStyle;
use YouNegotiate\Models\Merchant;
use YouNegotiate\Models\PersonalizedLogo;
use YouNegotiate\Models\SFTPDetails;
use YouNegotiate\Models\Subclient;
use YouNegotiate\Models\Template;
use YouNegotiate\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $company_name
 * @property string $country
 * @property string|null $address
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $fed_tax_id
 * @property string|null $younegotiate_url
 * @property string|null $bank1_name
 * @property string|null $bank1_address
 * @property string|null $bank1_city
 * @property string|null $bank1_state
 * @property string|null $bank1_zip
 * @property string|null $bank1_company_name
 * @property string|null $bank1_company_address
 * @property string|null $bank1_company_city
 * @property string|null $bank1_company_state
 * @property string|null $bank1_company_zip
 * @property string|null $bank1_account_type
 * @property string|null $bank1_routing
 * @property string|null $bank1_account_number
 * @property string|null $billing_name
 * @property string|null $billing_email
 * @property string|null $billing_phone
 * @property string|null $technical_name
 * @property string|null $technical_email
 * @property string|null $technical_phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $custom_style_id
 * @property string|null $profile_completed_at
 * @property string|null $approved_at
 * @property int|null $approved_by
 * @property float|null $pif_balance_discount_percent
 * @property float|null $ppa_balance_discount_percent
 * @property float|null $min_monthly_pay_percent
 * @property float|null $max_days_first_pay
 * @property string $status
 * @property float|null $rnn_share
 * @property string|null $billing_schedule
 * @property string|null $send_commission
 * @property Carbon|null $deleted_at
 * @property string|null $owner1_full_name
 * @property string|null $owner1_email
 * @property string|null $owner1_phone
 * @property string|null $account_contact_full_name
 * @property string|null $account_contact_email
 * @property string|null $account_contact_phone
 * @property string|null $industry_type
 * @property float|null $email_rate
 * @property float|null $sms_rate
 * @property float|null $eletter_rate
 * @property string|null $rnn_id
 * @property string|null $contract_date
 * @property string|null $timezone
 * @property float|null $custom_pif_balance_discount_percent
 * @property float|null $custom_ppa_balance_discount_percent
 * @property float|null $custom_min_monthly_pay_percent
 * @property float|null $custom_max_days_first_pay
 * @property int|null $is_deactive
 * @property float $licence_fees
 * @property string|null $tilled_account_id
 * @property-read Collection<int, Template> $Activetemplates
 * @property-read int|null $activetemplates_count
 * @property-read ClientApiKey|null $apiKey
 * @property-read Collection<int, Campaign> $campaigns
 * @property-read int|null $campaigns_count
 * @property-read CompanyTerm|null $companyTerm
 * @property-read Collection<int, Consumer> $consumers
 * @property-read int|null $consumers_count
 * @property-read Collection<int, CustomConsumerTerm> $custom_consumer_terms
 * @property-read int|null $custom_consumer_terms_count
 * @property-read Collection<int, CustomContent> $custom_contents
 * @property-read int|null $custom_contents_count
 * @property-read CustomStyle|null $custom_style
 * @property-read mixed $active_status
 * @property-read mixed $name
 * @property-read mixed $type
 * @property-read Merchant $merchant
 * @property-read Merchant $merchantACH
 * @property-read Merchant $merchantCC
 * @property-read Company|null $parentCompany
 * @property-read PersonalizedLogo|null $personalized
 * @property-read PersonalizedLogo|null $personalizedLogo
 * @property-read SFTPDetails|null $sftpDetails
 * @property-read Collection<int, Subclient> $subclients
 * @property-read int|null $subclients_count
 * @property-read Collection<int, Template> $templates
 * @property-read int|null $templates_count
 * @property-read Collection<int, Transaction> $transaction
 * @property-read int|null $transaction_count
 * @property-read User|null $user
 */

interface ICompany
{
}