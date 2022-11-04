<?php

namespace App\Traits;

class SamayaSms
{
    public static function sendTextSMS($contact, $message = 'Hello Test'): bool|string
    {
        $api_key = config('sms.api_key');
        $from = config('sms.sms_id');
        $contacts = $contact;
        $sms_text = urlencode($message);
//Submit to server

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://bulk.textnepal.com/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=$api_key&campaign=XXXXXX&routeid=XXXXXX&type=text&responsetype=json&contacts=$contacts&senderid=$from&msg=$sms_text");
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public static function getCreditBalance(): bool|string
    {
        $api_key = config('sms.api_key');
        $api_url = "https://bulk.textnepal.com/miscapi/" . $api_key . "/getBalance/true/";

//Submit to server

        return file_get_contents($api_url);
    }

    public static function fetchApiKey($login_id, $password): bool|string
    {
        $api_url = "https://bulk.textnepal.com/getkey/" . $login_id . "/" . $password;

//Submit to server

        return file_get_contents($api_url);
    }

    public static function getLastTransactionReport(): bool|string
    {
        $api_key = config('sms.api_key');

        $api_url = "https://bulk.textnepal.com/lasttran/index.php?key=" . $api_key;

//Submit to server

        return file_get_contents($api_url);
    }
}
