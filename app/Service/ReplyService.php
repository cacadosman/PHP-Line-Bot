<?php
    namespace App\Service;

    use App\Service\BaseService;
    use Lib\Action;

    class ReplyService extends BaseService
    {
        public function replySimiliarMessage()
        {
            $replyText = self::$event['message']['text'];
            $displayName = Action::getProfile()['displayName'];

            $result = $displayName . ": " . $replyText;
            return self::$bot->replyText(self::$event['replyToken'], $result);
        }

        public function replyWorld()
        {
            return self::$bot->replyText(self::$event['replyToken'], "world");
        }
    }