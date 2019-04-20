<?php
    namespace App\Service;

    class BaseService
    {
        protected static $bot;
        protected static $event;

        public function __construct($object)
        {
            self::$bot = $object::getBot();
            self::$event = $object::getEvent();
        }
    }