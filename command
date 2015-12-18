#!/usr/bin/env php
<?php
// application.php

require __DIR__.'/vendor/autoload.php';

use App\InitCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new InitCommand());
$application->run();
