<?php

namespace App\Helpers\Sms;

use Illuminate\Support\Facades\Http;

class Fast2Sms
{

    public $api_url;
    public $api_key;
    public $sender_id;

    function __construct()
    {
        $this->api_url = config('sms.fast2sms.api_url');
        $this->api_key = config('sms.fast2sms.api_key');
        $this->sender_id = config('sms.fast2sms.sender_id');
    }

    public function sendOtp($phone, $otp)
    {
        $curl = curl_init();

        $message = "Your OTP is " . $otp . ". Please do not share it with anyone.";
        //   CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2?authorization=YOUR_API_KEY&message=".urlencode('This is a test message')."&language=english&route=q&numbers=".urlencode('9999999999,8888888888,7777777777'),
        $url = $this->api_url . "?authorization=" . $this->api_key . "&sender_id=" . $this->sender_id . "&message=" . urlencode($message) . "&language=english&route=p&numbers=" . urlencode($phone);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }
}
