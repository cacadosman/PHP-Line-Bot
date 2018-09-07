<?php

namespace App\LineBot;

use App\LineBot\Methods\Event;
use App\MainEvent;

class Bot extends Core{

    public function index(){
        foreach($this->EventsHandler() as $event){
            $Events = new MainEvent();
      
            switch (Event::type($event)) {
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
