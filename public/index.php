<?php
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
        
        $className = "\\App\\" . ucfirst($event['type']);
        $application = new $className;

        $response = $application->execute($bot, $event, []);
        if ($response !== null) {
            return $response->isSucceeded();
        }
    }
