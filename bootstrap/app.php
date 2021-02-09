<?php
    use LINE\LINEBot;
    use LINE\LINEBot\HTTPClient\CurlHTTPClient;
    use LINE\LINEBot\Constant\HTTPHeader;
    use LINE\LINEBot\Exception\InvalidEventRequestException;
    use LINE\LINEBot\Exception\InvalidSignatureException;
    use Dotenv\Dotenv;

    use LINE\LINEBot\Event\MessageEvent;

    // Load Env
    $dotenv = Dotenv::create(__DIR__ . "/../");
    $dotenv->load();

    // Load Configuration
    $config = function(string $args){
        try 
        {
            $config = require "config.php";
            return $config[$args];
        }
        catch(Exception $e)
        {
            return null;
        }
    };

    $httpException = function(int $HttpStatus, string $text){
        echo $text;
        http_response_code($HttpStatus);
        exit();
    };

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if ($requestMethod !== "POST")
    {
        $httpException(405, "Method Not Allowed");
    }

    $channelSecret = $config("CHANNEL_SECRET");
    $channelToken = $config("CHANNEL_TOKEN");

    $bot = new LINEBot(new CurlHTTPClient($channelToken), [
        'channelSecret' => $channelSecret
    ]);

    $signature = getallheaders()["x-line-signature"];

    if (empty($signature))
    {
        $httpException(400, "Bad Request");
    }

    $body = file_get_contents('php://input');

    try {
        $events = $bot->parseEventRequest($body, $signature);
    } catch (InvalidSignatureException $e) {
        $httpException(400, "Invalid signature");
    } catch (InvalidEventRequestException $e) {
        $httpException(400, "Invalid event request");
    }
