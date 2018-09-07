<?php

namespace App\LineBot\Methods;

use App\LineBot\Core;

class Message extends Core{
    public static function type($event){
        return $event['message']['type'];
    }
    public static function id($event){
        return $event['message']['id'];
    }

    //Text

    public static function text($event){
        return $event['message']['text'];
    }

    //File

    public static function fileName($event){
        return $event['message']['fileName'];
    }
    public static function fileSize($event){
        return $event['message']['fileSize'];
    }

    //Location
    public static function title($event){
        return $event['message']['title'];
    }
    public static function address($event){
        return $event['message']['address'];
    }
    public static function latitude($event){
        return $event['message']['latitude'];
    }
    public static function longtitude($event){
        return $event['message']['logtitude'];
    }

    //Sticker
    public static function packageId($event){
        return $event['message']['packageId'];
    }
    public static function stickerId($event){
        return $event['message']['stickerId'];
    }

    //Postback

    public static function postbackData($event) {
        return $event['postback']['data'];
    }
}