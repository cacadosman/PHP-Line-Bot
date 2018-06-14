<?php

namespace App\LineBot;

use App\LineBot\Functions;
use App\Controllers\EventsController;

class Bot extends Functions{

    public function index(){
        foreach($this->EventsHandler() as $event){
            $Events = new EventsController();

            switch ($this->botEventType($event)) {
                case 'message':
                    $Events->message($event);
                    break;
                case 'follow':
                    $Events->follow($event);
                    break;
                case 'unfollow':
                    $Events->unfollow($event);
                    break;
                case 'join':
                    $Events->join($event);
                    break;
                case 'leave':
                    $Events->leave($event);
                    break;
            }
        
        }
    }

}