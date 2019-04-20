<?php
    namespace Lib;

    class Action
    {
        private static $bot;
        private static $event;

        public static function initialize($bot, $event)
        {
            self::$bot = $bot;
            self::$event = $event;
        }

        public static function getProfile()
        {
            $uid = self::$event['source']['userId'];
            $profile = self::$bot->getProfile($uid);
            return $profile->getJSONDecodedBody();
        }

        public static function getGroupMemberProfile()
        {
            $gid = self::$event['source']['groupId'];
            $uid = self::$event['source']['userId'];
            $profile = self::$bot->getGroupMemberProfile($gid, $uid);
            return $profile->getJSONDecodedBody();
        }

        public static function getRoomMemberProfile()
        {
            $gid = self::$event['source']['roomId'];
            $uid = self::$event['source']['userId'];
            $profile = self::$bot->getRoomMemberProfile($gid, $uid);
            return $profile->getJSONDecodedBody();
        }

        public static function getContent()
        {
            $mid = self::$event['message']['id'];
            $response = self::$bot->getMessageContent($mid);

            if ($response->isSucceeded())
                return $response->getRawBody();
            else
                return null;
        }

        public static function leaveRoom()
        {
            return self::$bot->leaveRoom(self::$event['source']['roomId']);
        }

        public static function leaveGroup()
        {
            return self::$bot->leaveGroup(self::$event['source']['groupId']);
        }

        public static function replyText($message)
        {
            return self::$bot->replyText(self::$event['replyToken'], $message);
        }

        public static function replyMessage($message)
        {
            return self::$bot->replyMessage(self::$event['replyToken'], $message);
        }

        public static function pushMessage($to, $message)
        {
            return self::$bot->pushMessage($to, $message);
        }

        public static function multicast($to, $message)
        {
            return self::$bot->multicast($to, $message);
        }

        public static function broadcast($message)
        {
            return self::$bot->broadcast($message);
        }
    }