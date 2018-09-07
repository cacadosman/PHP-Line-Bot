<?php

namespace App\LineBot\Methods;

use App\LineBot\Core;

class Event extends Core{
    public static function replyToken($event){
        return $event['replyToken'];
    }

    public static function type($event){
        return $event['type']; 
        //message, follow, unfollow, join, leave, postback, beacon
    }    
}