<?php

require_once __DIR__ . '/../vendor/autoload.php';

$persistence = new \Amida\PersistenceProvider(
    new \Amida\PersistenceFile(__DIR__ . '/../../data/cache/U3b25ad27acd7b804f803e6c6b57b6dfa')
);
$bag = $persistence->fetch(\Amida\Bag::class);
var_dump($bag);