<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller
{
    public function paypal(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent"=> "CAPTURE",
            "application_context" => [
                "return_url"=> route('success'),
                "cancel_url"=> route('cancel')
            ],
            "purchase_units"=> [
                [
                    "amount"=> [
                    "currency_code"=> "USD",
                    "value"=> $request->price
                    ]
                ]
        ]
        ]);
        // dd($response);
        if (isset($response['id']) && $response['id']!=null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('cancel');
        }
    }
    public function success(Request $request){
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);
        if (isset($response['status']) && $response['status']=="COMPLETED") {
            //add to db
            $data['title'] = 'Success';
            // return redirect()->route('user.profile');
            return view('profile', $data);
        } else {
            return redirect()->route('cancel');
        }
    }
    public function cancel(Request $request){
        return "Payment cancelled.";
    }
}
