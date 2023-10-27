<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use YouNegotiate\Models\Interfaces\ITemplate;
use App\Models\User;

class Template extends BaseModel implements ITemplate
{
    use SoftDeletes;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id')->withDefault(['name' => $this->created_by]);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }

    public function getType()
    {
        $type = '';
        switch (strtolower($this->type)) {
            case 'email':
                $type = 'Email';
                break;
            case 'sms':
                $type = 'SMS';
                break;
            default:
                break;
        }

        return $type;
    }

    public function company_name()
    {
        $company = Company::find($this->company_id);
        if ($company) {
            return $company->company_name;
        }

        return '-';
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($item) {
            $item->company_id = auth()->user()->company_id;
            $item->created_by = auth()->user()->id;
        });
        self::deleting(function ($item) {
            $item->campaigns()->delete();
        });
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

        //$invitation_link = new_invitation_link($consumer->invitation_link, $customer_communication_link);

        $createdContent = strtr($this->content, [
            '[First Name]' => $consumer->first_name,
            '[Last Name]' => $consumer->last_name,
            '[Master account number]' => $consumer->account_number,
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
            '[Master name]' => $consumer->company->company_name,
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
            '[Account QR Code]' => '<img src="http://api.qrserver.com/v1/create-qr-code/?data='.$consumer->invitation_link.'&size=100x100" width="100" height="100">',
            '[Reg F Letter Link]' => '<a href="https://'.$customer_communication_link.'.younegotiate.com/cfpb_letter_pdf/'.$consumer->id.'" target="_blank">Click here to download Reg F Letter</a>',
        ]);

        return $createdContent;
    }
}
