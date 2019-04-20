<?php

    return [
        "DB_CONNECTION" => getenv("DB_CONNECTION", "mysql"),
        "DB_HOST" => getenv("DB_HOST", "127.0.0.1"),
        "DB_PORT" => getenv("DB_PORT", 3306),
        "DB_DATABASE" => getenv("DB_DATABASE", "homestead"),
        "DB_USERNAME" => getenv("DB_USERNAME", "root"),
        "DB_PASSWORD" => getenv("DB_PASSWORD", ""),
        
        "CHANNEL_SECRET" => getenv("CHANNEL_SECRET", ""),
        "CHANNEL_TOKEN" => getenv("CHANNEL_TOKEN", ""),
    ];