<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function makePayment(Request $request){
        //$responseURL = "www.google.com";

        $data = array(
            "merchantId" => "MERCHANTUAT",
            "merchantTransactionId" => "MT7850590068188104",
            "merchantUserId" => "MUID123",
            "amount" => 10000,
            "redirectUrl" =>  'www.google.com',
            "redirectMode" => "POST",
            "callbackUrl" => 'www.google.com',
            "mobileNumber" => "9999999999",
            "paymentInstrument" => array(
              "type" => "PAY_PAGE"
            ),
        );

        $encode = base64_encode(json_encode($data));

        $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay/'.$saltKey;
        $sha256 = hash('sha256',$string); 

        $finalXHeader = $sha256.'###'.$saltIndex;

        $client = new Client();

        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-VERIFY' => $finalXHeader,
            ],
            'json' => ['request' => $encode],
            RequestOptions::VERIFY => false,
        ];

        $response = $client->post('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay', $options);

        $responseBody = $response->getBody()->getContents();
        dd($responseBody);
        return json_decode($responseBody, true);
    }

}