<?php

    namespace App;

    use App\BaseApplication;
    use App\Service\ReplyService;

    class Application extends BaseApplication
    {
        public function __construct()
        {
            $this->replyService = new ReplyService($this);
        }

        public function message()
        {
            if (self::$event['message']['text'] === "hello")
                return $this->replyService->replyWorld();
            
            return $this->replyService->replySimiliarMessage();
        }

        public function postback()
        {
        }

        public function follow()
        {
        }

        public function unfollow()
        {
        }

        public function join()
        {
        }

        public function leave()
        {
        }

        public function memberJoin()
        {
        }

        public function memberLeave()
        {
        }

        public function beacon()
        {
        }

        public function accountLink()
        {
        }

        public function deviceLink()
        {
        }

        public function deviceUnlink()
        {
        }
    }