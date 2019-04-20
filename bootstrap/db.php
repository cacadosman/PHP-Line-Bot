<?php
    use Illuminate\Database\Capsule\Manager as Capsule;

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => $config("DB_CONNECTION"),
        'host'      => $config("DB_HOST"),
        'port'      => $config("DB_PORT"),
        'database'  => $config("DB_DATABASE"),
        'username'  => $config("DB_USERNAME"),
        'password'  => $config("DB_PASSWORD"),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);
    
    $capsule->setAsGlobal();