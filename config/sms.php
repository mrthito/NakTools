<?php

return [
    'gateway' => env('SMS_GATEWAY', 'fast2sms'),
    'fast2sms' => [
        'api_url' => env('FAST2SMS_API_URL', 'https://www.fast2sms.com/dev/bulk'),
        'api_key' => env('FAST2SMS_API_KEY', 'your-api-key'),
        'sender_id' => env('FAST2SMS_SENDER_ID', 'FSTSMS'),
    ],
    'smsc' => [
        'api_url' => env('SMSC_API_URL', 'http://smsc.ru/sys/send.php'),
        'login' => env('SMSC_LOGIN', 'your-login'),
        'password' => env('SMSC_PASSWORD', 'your-password'),
    ],
];
