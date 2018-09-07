<?php

namespace App\LineBot\Methods;

use App\LineBot\Core;

class Source extends Core{
    public static function type($event){
        return $event['source']['type'];
    }

    public static function userId($event){
        return $event['source']['userId'];
    }

    public static function roomId($event){
        return $event['source']['roomId'];
    }

    public static function groupId($event){
        return $event['source']['groupId'];
    }

    public static function isGroup($event){
        if($event['source']['type'] == "group"){
            return true;
        }
    }

    public static function isRoom($event){
        if($event['source']['type'] == "room"){
            return true;
        }
    }
}