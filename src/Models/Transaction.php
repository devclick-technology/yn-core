<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use YouNegotiate\Models\Interfaces\ITransaction;

class Transaction extends Model implements ITransaction
{
    protected $fillable = ['transaction_id', 'consumer_login_id', 'transaction_type', 'consumer_id', 'company_id',
        'payment_profile_id', 'status', 'gateway_respnse_raw', 'status', 'status_code', 'amount',
        'flat_transaction_charges', 'rnn_share', 'company_share', 'subclient1_share', '	subclient2_share', 'payment_mode', '	last4digit', 'sub_client1_id', 'sub_client2_id', 'processing_charges',
        'rnn_invoice_id', 'superadmin_process',
    ];

    protected $appends = ['rnn_share_amount'];

    public function consumer()
    {
        return $this->belongsTo(Consumer::class, 'consumer_id', 'id');
    }

    public function getRnnShareAmountAttribute()
    {
        return $this->rnn_share;
    }

    public function createTemplateContent($consumer)
    {
        $date = date('Y-m-d');
        $company = $consumer->company;
        $customer_communication_link = null;
        $personalizedLogo = '';
        if (isset($company->personalized)) {
            $personalizedLogo = $company->personalized;
            if (isset($personalizedLogo->customer_communication_link)) {
                $customer_communication_link = $personalizedLogo->customer_communication_link;
            }
        }

        $invitation_link = new_invitation_link($consumer->invitation_link, $customer_communication_link);

        $createdContent = strtr($this->message, [
            '[First Name]' => $consumer->first_name,
            '[Last Name]' => $consumer->last_name,
            '[Master account number]' => $consumer->account_number,
            '[Master name]' => $consumer->company->company_name,
            '[Account Balance]' => number_format($consumer->current_balance, 2),
            '[Payment Set up Discount %]' => number_format($consumer->actualPSD(), 2).'%',
            '[Payment Set up Discount Amount]' => number_format($consumer->actualPSDamount(), 2),
            '[Pay in Full Discount %]' => number_format($consumer->actualPIF(), 2).'%',
            '[Pay in Full Discount Amount]' => number_format($consumer->actualPIFamount(), 2),
            '[You Negotiate Link]' => $consumer->invitation_link,
            '[Pass Through 1]' => $consumer->pass_through1,
            '[Pass Through 2]' => $consumer->pass_through2,
            '[Pass Through 3]' => $consumer->pass_through3,
            '[Pass Through 4]' => $consumer->pass_through4,
            '[Pass Through 5]' => $consumer->pass_through5,
            '[Date]' => $date,
            '[Address 1]' => $consumer->address1,
            '[Address 2]' => $consumer->address2,
            '[City]' => $consumer->city,
            '[State]' => $consumer->state,
            '[Zip]' => $consumer->zip,
            '[Total Balance Due]' => number_format($consumer->current_balance, 2),
            '[Current creditor account number]' => $consumer->account_number,
            '[Original creditor account number]' => $consumer->account_number,
            '[Current creditor name]' => $consumer->company->company_name,
            '[Original creditor name]' => $consumer->getCompanyName(),
            '[DOB]' => $consumer->dob,
            '[Last 4 SSN]' => $consumer->last4ssn,
            '[Settlement $ Amount]' => $consumer->min_pay_in_full(),
            '[Account QR Code]' => '<img src="http://api.qrserver.com/v1/create-qr-code/?data='.$invitation_link.'&size=100x100" width="100" height="100">',
            '[Reg F Letter Link]' => '<a href="https://'.$customer_communication_link.'.younegotiate.com/cfpb_letter_pdf/'.$consumer->id.'" target="_blank">Click here to download Reg F Letter</a>',
        ]);

        return $createdContent;
    }

    public function scheduleTransaction(): HasOne
    {
        return $this->hasOne(ScheduleTransaction::class, 'transaction_id', 'transaction_id');
    }

    public function paymentProfileWithTrash(): BelongsTo
    {
        return $this->belongsTo(PaymentProfile::class, 'payment_profile_id')->withTrashed();
    }
}
