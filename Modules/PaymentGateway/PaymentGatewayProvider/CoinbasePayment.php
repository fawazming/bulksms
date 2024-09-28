<?php

namespace Modules\PaymentGateway\PaymentGatewayProvider;

use App\Models\BillingRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Crypt;
class CoinbasePayment implements PaymentInterface
{
    public $planReq;
    public $redirect_url;
    public $error_message;
    public $return_view;
    public $will_redirect = false;

    public function __construct()
    {

    }

    public function pay()
    {
        // TODO: Implement pay() method.
    }

    public function plan_request($planReq)
    {
        $this->planReq = $planReq;
        return $this;
    }

    public function getCredentials()
    {
        $credentials = json_decode(get_settings('payment_gateway'));
        if (!$credentials->coin_base_api_key || !$credentials->coin_base_status=='active') {
            throw new \Exception('Credentials not found. Please contact with the administrator');
        }
        return $credentials;
    }

    public function request($request)
    {
        $this->request = $request;
        return $this;
    }

    public function plan($plan)
    {
        $this->plan = $plan;
        return $this;
    }

    public function will_redirect()
    {
        // TODO: Implement will_redirect() method.
        return $this->will_redirect;
    }

    public function redirect_url()
    {
        // TODO: Implement redirect_url() method.
        return $this->redirect_url;
    }

    public function return_view()
    {
        // TODO: Implement redirect_url() method.
        return $this->return_view;
    }

    public function error_message()
    {
        // TODO: Implement error_message() method.
        return $this->error_message;
    }

    public function process()
    {
        try {
            $settings = json_decode(get_settings('local_setting'));
            $credentials = json_decode(get_settings('payment_gateway'));
            $plan = $this->plan;
            $planReq = $this->planReq;
            $encrypt = Crypt::encryptString($planReq->customer_id);
            $body = [
                'name' => $plan->title,
                'description' => $plan->title.' plan purchase in '.formatNumberWithCurrSymbol($plan->price),
                'pricing_type' => 'fixed_price',
                'local_price' => [
                    'amount'=> $plan->price,
                    'currency' => $settings->currency_code ?? 'USD'
                ],
                'redirect_url'=> route('paymentgateway::payment.coinbase.completed',['id'=>$encrypt]),
                'cancel_url'=> route('paymentgateway::payment.coinbase.canceled',['id'=>$encrypt])
            ];
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://api.commerce.coinbase.com/charges', [
                'body' => json_encode($body),
                'headers' => [
                    'X-CC-Api-Key' => $credentials->coin_base_api_key,
                    'X-CC-Version' => '2018-03-22',
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ],
            ]);
            $hosted_url = json_decode($response->getBody()->getContents())->data->hosted_url;
            $this->redirect_url = $hosted_url;
            $this->will_redirect = true;
            $this->return_view = null;

        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            $this->error_message= $ex->getMessage();
        }
    }

}
