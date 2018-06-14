<?php

  namespace App\Controllers;

  use App\LineBot\Bot;

  class LineController{

    public function index($request, $response){
      $response = new Bot();
      $handler = $response->index();
      return $handler;    
    }

  }

?>
