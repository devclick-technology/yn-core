<?php

namespace YouNegotiate\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Log;
use YouNegotiate\Models\Interfaces\IMerchant;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use SoapClient;

class Merchant extends BaseModel implements IMerchant
{
    use HasFactory;

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function subclient()
    {
        return $this->belongsTo(Subclient::class, 'subclient_id', 'id')->withDefault(['name' => '']);
    }

    public function status()
    {
        if ($this->verified_at != null) {
            return 'Verified';
        } else {
            return 'Not Verified';
        }
    }

    //Verify Marchant Details
    public function verify()
    {
        Log::channel('transaction_command')->info('Verify Client----------');

        if ($this->merchant_name == 'authorize') {
            Log::channel('transaction_command')->info('Authorize.net payment selected');

            try {
                $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
                $merchantAuthentication->setName($this->authorize_login_id);
                $merchantAuthentication->setTransactionKey($this->authorize_transaction_key);

                $refId = 'ref'.time();
                // Set the transaction's refId
                $request = new AnetAPI\AuthenticateTestRequest($merchantAuthentication);
                $request->setMerchantAuthentication($merchantAuthentication);
                $controller = new AnetController\AuthenticateTestController($request);
                if (app()->isProduction()) {
                    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
                } else {
                    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
                }
                if ($response->getMessages()->getResultCode() == 'Ok') {
                    return true;
                } else {
                    return false;
                }
            } catch (\throwable $e) {
                Log::channel('transaction_command')->error($e);

                return false;
            }
        } elseif ($this->merchant_name == 'usaepay') {
            Log::channel('transaction_command')->info('Usaepay payment selected');

            try {
                if (app()->isProduction()) {
                    //live
                    $wsdl = 'https://www.usaepay.com/soap/gate/0AE595C1/usaepay.wsdl';
                } else {
                    //local
                    $wsdl = 'https://sandbox.usaepay.com/soap/gate/0AE595C1/usaepay.wsdl';
                }

                $client = new SoapClient($wsdl);
                $token = $this->getToken($this->usaepay_key, $this->usaepay_pin);
                $details = $client->getAccountDetails($token);

                return true;
            } catch (\throwable $e) {
                Log::channel('transaction_command')->error($e);

                return false;
            }
        } elseif ($this->merchant_name == 'paidyet') {
            Log::channel('transaction_command')->info('PaidYet payment selected');

            try {
                $postdata = [
                    'subdomain' => $this->paidyet_subdomain,
                    'key' => $this->paidyet_key,
                    'nonce' => rand(154678, 10000000),
                    'time' => time(),
                ];
                $ch = curl_init();
                $url = 'https://api.paidyet.com/v2/login';
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $output = curl_exec($ch);
                curl_close($ch);

                if (strpos($output, '"status":"OK"')) {
                    return true;
                } else {
                    return false;
                }
            } catch (\throwable $e) {
                Log::channel('transaction_command')->error($e);

                return false;
            }
        } elseif ($this->merchant_name == 'repay') {
            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://'.$this->repay_pin.'.repay.io/checkout/merchant/api/v1/checkout',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '{
            "payment_method": "card_token",
            "Source": "RNN Group"
            }',
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Authorization: apptoken '.$this->repay_key,
                ],
            ]);

            $response = json_decode(curl_exec($curl));
            curl_close($curl);

            if (isset($response->checkout_form_id)) {
                return true;
            } else {
                return false;
            }
        } elseif ($this->merchant_name == 'stripe') {
            try {
                $stripe = new \Stripe\StripeClient($this->stripe_secret_key);
                $customers = $stripe->customers->all([
                    'limit' => 1,
                ]);

                return true;
            } catch (\Stripe\Exception\AuthenticationException $e) {
                return false;
            }

            return false;
        } else {
            return false;
        }
    }

    public function getToken($key, $pin)
    {
        $sourcekey = $key;
        // generate random seed value
        $seed = time().rand();
        // make hash value using sha1 function
        $clear = $sourcekey.$seed.$pin;
        $hash = sha1($clear);
        // assembly ueSecurityToken as an array
        $token = [
            'SourceKey' => $sourcekey,
            'PinHash' => [
                'Type' => 'sha1',
                'Seed' => $seed,
                'HashValue' => $hash,
            ],
            'ClientIP' => $_SERVER['REMOTE_ADDR'],
        ];

        return $token;
    }

    public function processing_charge($amount)
    {
        $p_amount = 0;

        if ($this->processing_charge_amount != null) {
            $p_amount = $this->processing_charge_amount;
        } elseif ($this->processing_charge_percentage != null) {
            $p_amount = ($amount * $this->processing_charge_percentage) / 100;

            if ($this->max_processing_amount != null) {
                if ($p_amount > $this->max_processing_amount) {
                    $p_amount = $this->max_processing_amount;
                }
            }

            if ($this->min_processing_amount != null) {
                if ($p_amount < $this->min_processing_amount) {
                    $p_amount = $this->min_processing_amount;
                }
            }
        }

        return $p_amount;
    }
}
