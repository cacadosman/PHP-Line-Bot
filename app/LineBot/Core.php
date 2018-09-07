<?php

namespace App\LineBot;

use \LINE\LINEBot\SignatureValidator as SignatureValidator;

class Core{
    public $request;
    public static $bot;
    public $httpClient;

    public function __construct(){
        $this->request = file_get_contents('php://input');
        /* Get Header Data */
        $signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];
        /* Logging to Console*/
        file_put_contents('php://stderr', 'Body: '.$this->request);
        /* Validation */
        if (empty($signature)) {
            return "Siganature not Set";
        }

        if ($_ENV['PASS_SIGNATURE'] == false && !SignatureValidator::validateSignature($this->request, $_ENV['CHANNEL_SECRET'], $signature)) {
            return "Invalid Signature";
        }

        /* Initialize bot*/
        $this->httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
        self::$bot  = new \LINE\LINEBot($this->httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
    }

    public function EventsHandler(){
        $requestHandler = json_decode($this->request, true);
        return $requestHandler['events'];
    }
}