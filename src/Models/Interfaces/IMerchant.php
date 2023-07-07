<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\Company;
use YouNegotiate\Models\Subclient;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property string $merchant_name
 * @property string|null $merchant_type
 * @property string|null $usaepay_key
 * @property string|null $usaepay_pin
 * @property string|null $authorize_login_id
 * @property string|null $authorize_transaction_key
 * @property string|null $authorize_key
 * @property string|null $paidyet_key
 * @property string|null $paidyet_subdomain
 * @property float|null $processing_charge_percentage
 * @property float|null $processing_charge_amount
 * @property float|null $min_processing_amount
 * @property float|null $max_processing_amount
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $subclient_id
 * @property string|null $verified_at
 * @property string|null $repay_key
 * @property string|null $repay_pin
 * @property string|null $stripe_public_key
 * @property string|null $stripe_secret_key
 * @property-read Company|null $company
 * @property-read Subclient|null $subclient
 */

interface IMerchant
{
}