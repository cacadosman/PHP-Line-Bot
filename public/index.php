<?php

  require __DIR__ . '/../vendor/autoload.php';

  require __DIR__ . '/../bootstrap/app.php';
  require __DIR__ . '/../bootstrap/container.php';
  require __DIR__ . '/../routes/api.php';
  

  $app->run();

?>