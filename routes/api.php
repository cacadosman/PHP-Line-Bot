<?php

  use App\Controllers\LineController;
  use App\LineBot\Main;

  $app->get('/', function(){
    return "hello world";
  });

  $app->post('/', LineController::class . ':index');

?>
