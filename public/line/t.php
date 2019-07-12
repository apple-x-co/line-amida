<?php

require_once __DIR__ . '/../vendor/autoload.php';

$configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');

var_dump($configure);