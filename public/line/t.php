<?php

require_once __DIR__ . '/../vendor/autoload.php';

$configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');

$rootNode = $configure->getNodes()->firstMatch(['root' => 1]);

var_dump($rootNode->getContent());