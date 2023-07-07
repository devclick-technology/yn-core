<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use YouNegotiate\Models\Merchant;
use YouNegotiate\Models\Subclient;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string|null $subclient_name
 * @property string|null $industry_type
 * @property string|null $subclient_type
 * @property int $company_id
 * @property int|null $parent_id
 * @property string|null $share_payment
 * @property string|null $fed_tax_id
 * @property string|null $payment_method
 * @property string|null $mailing_address
 * @property string|null $mailing_address2
 * @property string|null $mailing_city
 * @property string|null $mailing_state
 * @property string|null $mailing_zip
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
 * @property int $default_payment_account
 * @property string|null $billing_name
 * @property string|null $billing_email
 * @property string|null $billing_phone
 * @property string|null $technical_name
 * @property string|null $technical_email
 * @property string|null $technical_phone
 * @property string|null $consumer_company_name
 * @property string|null $account_contact_full_name
 * @property string|null $account_contact_email
 * @property string|null $account_contact_phone
 * @property float|null $pif_balance_discount_percent
 * @property float|null $ppa_balance_discount_percent
 * @property float|null $min_monthly_pay_percent
 * @property float|null $max_days_first_pay
 * @property Carbon|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $unique_identifier
 * @property float|null $custom_pif_balance_discount_percent
 * @property float|null $custom_ppa_balance_discount_percent
 * @property float|null $custom_min_monthly_pay_percent
 * @property float|null $custom_max_days_first_pay
 * @property-read Company|null $company
 * @property-read mixed $name
 * @property-read mixed $type
 * @property-read Merchant $merchant
 * @property-read Subclient|null $parent
 */

interface ISubclient
{
}