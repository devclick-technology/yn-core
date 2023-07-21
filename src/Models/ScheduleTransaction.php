<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use YouNegotiate\Models\Interfaces\IScheduleTransaction;

class ScheduleTransaction extends Model implements IScheduleTransaction
{
    use HasFactory;

    protected $fillable = [
        'consumer_id',
        'consumer_login_id',
        'company_id',
        'sub_client1_id',
        'sub_client2_id',
        'payment_profile_id',
        'schedule_date',
        'status',
        'status_code',
        'amount',
        'processing_charges',
        'flat_transaction_charges',
        'rnn_share',
        'company_share',
        'subclient1_share',
        'subclient2_share',
        'attempt_count',
        'last_attempted_at',
        'transaction_type',
        'payment_complete',
    ];

    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }

    public function getFirstPayDate($frequency, $firstdate_payment)
    {
        $time = strtotime($firstdate_payment);
        $month = date('M', $time);
        $year = date('Y', $time);
        $date = date('d', $time);

        if ($frequency == 'weekly') {
            return date('M d, Y', strtotime($firstdate_payment.' + 1 week'));
        } elseif ($frequency == 'bimonthly') {
            return date('M d, Y', strtotime($firstdate_payment.' + 2 week'));
        } elseif ($frequency == 'monthly') {
            //return date('M d, Y',strtotime($firstdate_payment.' + 1 month'));
            if ($month == 'Jan') {
                if ($date == 29) {
                    return date('M d, Y', strtotime($firstdate_payment.' + 30 days'));
                } elseif ($date == 30) {
                    return date('M d, Y', strtotime($firstdate_payment.' + 29 days'));
                } else {
                    return date('M d, Y', strtotime($firstdate_payment.' + 1 month'));
                }
            } elseif ($month == 'Feb') {
                if ($date == 28) {
                    return date('M d, Y', strtotime($firstdate_payment.' + 30 days'));
                } else {
                    return date('M d, Y', strtotime($firstdate_payment.' + 1 month'));
                }
            } else {
                return date('M d, Y', strtotime($firstdate_payment.' + 1 month'));
            }
        }
    }

    public function ScheduleStripe($merchant, $schedule, $date, $installment_type)
    {
        $stripe = new \Stripe\StripeClient(
            $merchant->stripe_secret_key
        );
        $StripePaymentDetail = StripePaymentDetail::find($schedule->stripe_payment_detail_id);
        if (isset($StripePaymentDetail->stripe_response)) {
            $stp_res = json_decode($StripePaymentDetail->stripe_response, true);
            $row_ins = date('Y-m-d', strtotime($date));
            $dt = Carbon::createFromFormat('Y-m-d', $row_ins);
            $next_payment = $this->getFirstPayDate($installment_type, $row_ins);
            $end_dt = Carbon::createFromFormat('M d, Y', $next_payment);

            if (isset($stp_res['id'])) {
                $up_sp = $stripe->subscriptionSchedules->update(
                    $stp_res['id'],
                    [

                        'phases' => [
                            [
                                'items' => [
                                    [
                                        'price' => $stp_res['phases'][0]['items'][0]['price'],
                                        'quantity' => 1,
                                    ],
                                ],
                                'start_date' => $dt->timestamp,
                                'end_date' => $end_dt->timestamp,
                            ],
                        ],
                    ]
                );

                $StripePaymentDetail->stripe_response = json_encode($up_sp->toArray(), true);
                $StripePaymentDetail->save();

                return true;
            }
        }

        return false;
    }

    public function CancelStripeSubscription($stripe_payment_detail_id, $merchant)
    {
        $stripe = new \Stripe\StripeClient(
            $merchant->stripe_secret_key
        );
        $row_prev_sub = StripePaymentDetail::find($stripe_payment_detail_id);
        $res_detail = json_decode($row_prev_sub->stripe_response);
        $stripe->subscriptionSchedules->cancel(
            $res_detail->id,
            []
        );
        // StripePaymentDetail::where('id',$row_prev_sub->id)->delete();
    }

    public function paymentProfile(): BelongsTo
    {
        return $this->belongsTo(PaymentProfile::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
