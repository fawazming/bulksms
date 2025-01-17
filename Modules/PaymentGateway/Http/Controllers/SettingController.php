<?php

namespace Modules\PaymentGateway\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function store(Request $request){

       $validData=$request->only('paypal_client_id','paypal_client_secret','paypal_status','stripe_pub_key','stripe_secret_key','stripe_status','paytm_environment', 'paytm_mid', 'paytm_secret_key',
           'paytm_website', 'paytm_txn_url', 'paytm_status', 'mollie_api_key', 'mollie_status', 'paystack_status', 'paystack_merchant_email',
           'paystack_payment_url', 'paystack_secret_key', 'paystack_public_key','flutter_wave_public_key','flutter_wave_status','v_merchant_id','vogue_pay_status','iyzico_api_key',
           'iyzico_secret_key','iyzico_status','authorize_net_login_id','authorize_net_secret_key','authorize_net_transaction_key','authorize_net_status',
           'private_key','public_key','ipn_secret', 'merchant_id','coinpay_status',
           'offline_account_number','online_status','coin_base_api_key','coin_base_status');

        $data = ['name' => 'payment_gateway'];
        $setting = auth()->user()->settings()->firstOrNew($data);
        $setting->value = json_encode($validData);
        $setting->save();

        if ($request->authorize_net_login_id && $request->authorize_net_secret_key && $request->authorize_net_transaction_key){
            setEnv('AUTHORIZE_NET_LOGIN_ID', $request->authorize_net_login_id);
            setEnv('AUTHORIZE_NET_CLIENT_KEY', $request->authorize_net_secret_key);
            setEnv('AUTHORIZE_NET_TRANSACTION_KEY', $request->authorize_net_transaction_key);
        }
        cache()->flush();


        return response()->json(['status' => 'success', 'message' => trans('Payment gateway setting updated')]);

    }
}
