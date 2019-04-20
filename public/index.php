<?php

    use App\Application;

    use Lib\Action;

    use LINE\LINEBot\Event\MessageEvent;
    use LINE\LINEBot\Event\PostbackEvent;

    require __DIR__ . "/../vendor/autoload.php";
    require __DIR__ . "/../bootstrap/app.php";
    require __DIR__ . "/../bootstrap/db.php";

    $application = null;
    $response = null;

    $requestHandler = json_decode($body, true);

    foreach ($requestHandler['events'] as $event)
    {
        Action::initialize($bot, $event);
        Application::initialize($bot, $event);
        
        if ($application === null)
        {
            $application = new Application();
        }

        switch ($event['type'])
        {
            case 'message':
                $response = $application->message();
                break;
            case 'postback':
                $response = $application->postback();
                break;
            case 'follow':
                $response = $application->follow();
                break;
            case 'unfollow':
                $response = $application->unfollow();
                break;
            case 'join':
                $response = $application->join();
                break;
            case 'leave':
                $response = $application->leave();
                break;
            case 'memberJoined':
                $response = $application->memberJoin();
                break;
            case 'memberLeft':
                $response = $application->memberLeave();
                break;
            case 'beacon':
                $response = $application->beacon();
                break;
            case 'accountLink':
                $response = $application->accountLink();
                break;
            case 'things':
                if ($event['type']['things']['type'] === 'link')
                    $response = $application->deviceLink();
                else
                    $response = $application->deviceUnlink();
                break;
            default:
                return $response;
        }

        return $response->isSucceeded();
    }
