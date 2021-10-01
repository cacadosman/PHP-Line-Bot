<?php

namespace App;

use App\Contract\Command;
use Lib\Action;

class Message implements Command
{
    public function execute($bot, $event, $data = [])
    {
        if ($event['message']['text'] === 'hello')
        {
            return $bot->replyText($event['replyToken'], "world");
        }

        return $this->replySimiliarMessage($bot, $event);
    }

    public function replySimiliarMessage($bot, $event, $data = [])
    {
        $replyText = $event['message']['text'];
        $displayName = Action::getProfile()['displayName'];

        $result = $displayName . ": " . $replyText;
        return $bot->replyText($event['replyToken'], $result);
    }
}
