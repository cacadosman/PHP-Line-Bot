<?php

  // load config
  $dotenv = new Dotenv\Dotenv(__DIR__ . "/..");
  $dotenv->load();

  $app = new \Slim\App([
    'settings' => [
      'displayErrorDetails' => true,
      'db' => [
        'driver' => $_ENV['DRIVER'],
        'host' => $_ENV['HOST'],
        'database' => $_ENV['DATABASE'],
        'username' => $_ENV['USERNAME'],
        'password' => $_ENV['PASSWORD'],
        'charset'   => $_ENV['CHARSET'],
        'collation' => $_ENV['COLLATION'],
        'prefix'    => $_ENV['PREFIX'],
      ]
    ]
  ]);

?>
