#!/usr/bin/env php
<?php
// application.php


require __DIR__.'/vendor/autoload.php';

use DisBike\BikeBundle\Console\BuildBikeCommand;

use Symfony\Component\Console\Application;


$application = new Application();
$application->add(new BuildBikeCommand());
$application->run();
