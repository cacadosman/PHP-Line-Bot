<?php

namespace App\Contract;

interface Command
{
    public function execute($bot, $event, $data = []);
}