<?php

    namespace App;

    class BaseApplication
    {
        protected static $bot;
        protected static $event;

        public static function initialize($bot, $event)
        {
            self::$bot = $bot;
            self::$event = $event;
        }

        public static function getBot()
        {
            return self::$bot;
        }

        public static function getEvent()
        {
            return self::$event;
        }
    }