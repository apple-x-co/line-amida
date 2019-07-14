<?php

require_once __DIR__ . '/../vendor/autoload.php';

$configure = \Amida\ConfigureLoader::load(__DIR__ . '/../config/amida.php');

$rootNode = $configure->getNodes()->firstMatch(['root' => 1]);

$bag = new \Amida\Bag();
$bag->addNode($rootNode);

$persistence = new \Amida\Persistence(__DIR__ . '/t.dat');
//$serializer->save($bag);
$aBag = $persistence->fetch(\Amida\Bag::class);
var_dump(get_class($aBag));