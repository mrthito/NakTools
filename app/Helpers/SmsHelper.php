<?php

namespace App\Helpers;

use App\Helpers\Sms\Fast2Sms;
use Illuminate\Support\Facades\Http;

class SmsHelper
{

    public $sms_gateway;

    function __construct()
    {
        $this->sms_gateway = config('sms.gateway');
    }

    public function gateways()
    {
        return [
            'fast2sms' => Fast2Sms::class
        ];
    }

    public function sendOtp($phone, $message)
    {
        $gateway = $this->gateways()[$this->sms_gateway];
        $gateway = new $gateway();
        return $gateway->sendOtp($phone, $message);
    }
}
