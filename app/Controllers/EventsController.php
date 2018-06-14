<?php

  namespace App\Controllers;

  use App\LineBot\Functions;
  use App\Model\User;

  /* Line BOT Examples */
  class EventsController extends Functions{
      
    public function message($event){
      if($this->botEventMessageType($event) == "text"){
        // Reply
        $this->botReplyText($event,$this->botEventMessageText($event));
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