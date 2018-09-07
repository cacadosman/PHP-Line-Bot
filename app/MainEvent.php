<?php

  namespace App;

  use App\LineBot\Methods\Event;
  use App\LineBot\Methods\Source;
  use App\LineBot\Methods\Message;
  use App\LineBot\Methods\Action;
  use App\Model\User;

  /* Line BOT Examples */
  class MainEvent{
      
    public function message($event){

      if(Message::type($event) == "text"){
        // Reply
        Action::replyText($event,Message::text($event));
      }
    }

    public function follow($event){
  
    }

    public function unfollow($event){
    
    }

    public function join($event){
     
    }

    public function leave($event){
      
    }

  }
?>