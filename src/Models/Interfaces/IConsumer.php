<?php

namespace YouNegotiate\Models\Interfaces;

use YouNegotiate\Models\CommunicationStatus;
use YouNegotiate\Models\Company;
use YouNegotiate\Models\ConsumerNegotiation;
use YouNegotiate\Models\ConsumerProfile;
use YouNegotiate\Models\ConsumerUnsubscription;
use YouNegotiate\Models\PaymentProfile;
use YouNegotiate\Models\ScheduleTransaction;
use YouNegotiate\Models\Subclient;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int|null $company_id
 * @property int|null $consumerProfile
 * @property int|null $consumer_login_id
 * @property int|null $sub_client1_id
 * @property string|null $sub_client1_name
 * @property int|null $sub_client2_id
 * @property string|null $sub_client2_name
 * @property int|null $reference_number
 * @property string|null $account_number
 * @property string $status
 * @property int|null $unique_customer_id
 * @property string|null $full_ssn
 * @property string|null $last4ssn
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $dob
 * @property string|null $gender
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zip
 * @property string|null $mobile1
 * @property string|null $mobile2
 * @property string|null $mobile3
 * @property string|null $land1
 * @property string|null $land2
 * @property string|null $land3
 * @property string|null $email1
 * @property string|null $email2
 * @property string|null $email3
 * @property float|null $total_balance
 * @property int|null $principle_balance
 * @property int|null $fees_balance
 * @property int|null $daily_interest_add
 * @property int|null $monthly_interest_add
 * @property float|null $current_balance
 * @property float|null $min_one_time_percent
 * @property float|null $pif_discount_balance
 * @property float|null $pif_discount_percent
 * @property int $negotiation_rule
 * @property float|null $pay_setup_discount_percent
 * @property float|null $min_monthly_pay_percent
 * @property float|null $min_monthly_pay_amount
 * @property int|null $max_days_first_pay
 * @property float|null $group_pif_discount_percent
 * @property float|null $group_pay_setup_discount_percent
 * @property float|null $group_min_monthly_pay_percent
 * @property float|null $group_max_days_first_pay
 * @property string|null $pass_through1
 * @property string|null $pass_through2
 * @property string|null $pass_through3
 * @property string|null $pass_through4
 * @property string|null $pass_through5
 * @property string|null $last_login_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $ppa_amount
 * @property int $counter_offer
 * @property int $offer_accepted
 * @property int $payment_setup
 * @property int $has_failed_payment
 * @property string|null $account_open_date
 * @property string|null $placement_date
 * @property string|null $expiry_date
 * @property string|null $accrued_interest_rate
 * @property string|null $token
 * @property int $custom_offer
 * @property string|null $invitation_link
 * @property string|null $sub_client1_account_number
 * @property string|null $sub_client2_account_number
 * @property int $skip_schedules
 * @property int|null $campaign_id
 * @property string|null $communication_status_code
 * @property int|null $negotiation_count
 * @property int|null $cfpb_communication
 * @property int|null $file_upload_history_id
 * @property int|null $amounts_in_interest
 * @property int|null $amounts_in_fees
 * @property int|null $ammounts_in_debt
 * @property string|null $forward
 * @property string|null $despute_date
 * @property int|null $text_permission
 * @property int|null $email_permission
 * @property int|null $mobile_call_permission
 * @property int|null $lanline_call_permission
 * @property int|null $usps_permission
 * @property string|null $co_signer_first_name
 * @property string|null $co_signer_last_name
 * @property string|null $co_signer_email
 * @property string|null $co_signer_mobile
 * @property string|null $co_signer_address1
 * @property string|null $co_signer_address2
 * @property string|null $co_signer_city
 * @property string|null $co_signer_state
 * @property string|null $co_signer_zip
 * @property string|null $account_type
 * @property string|null $amount_paid_on_account
 * @property string|null $interest_dollars
 * @property string|null $fees_dollars
 * @property string|null $asof_date_owed
 * @property string|null $asofdate_owed_amount
 * @property string|null $paymentcredits_towards_debt
 * @property string|null $write_callby_date
 * @property string|null $cfpb_passthrough1
 * @property string|null $cfpb_passthrough2
 * @property string|null $cfpb_passthrough3
 * @property string|null $cfpb_passthrough4
 * @property string|null $cfpb_passthrough5
 * @property-read ConsumerNegotiation|null $allConsumerNegotiation
 * @property-read CommunicationStatus|null $communication_status
 * @property-read Company|null $company
 * @property-read mixed $from_details
 * @property-read mixed $full_name
 * @property-read PaymentProfile|null $paymentProfile
 * @property-read Collection<int, ScheduleTransaction> $scheduledTransactions
 * @property-read int|null $scheduled_transactions_count
 * @property-read Subclient|null $subclient1
 * @property-read Subclient|null $subclient2
 * @property-read ConsumerUnsubscription|null $unsubscription
 */

interface IConsumer
{
}