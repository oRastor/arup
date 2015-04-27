<?php

set_time_limit(0);

require 'simple_html_dom.php';
require 'autoParser.php';
require 'collector.php';
$config = require 'config.php';

$pdo = new PDO("mysql:host={$config['db']['host']};dbname={$config['db']['dbname']}", $config['db']['username'], $config['db']['password'], $config['db']['options']);

$autoParser = new AutoParser();
$collector = new Collector($pdo);

$current = $collector->getLastInsertValue();
$stack = array();

while (true) {
    $current++;

    $data = $autoParser->getAutoDetails($current);
    if ($data === false) {
        echo "Waiting 30 sec\n";
        sleep(30);
    } else {
        $collector->insert($data);
        $collector->setLastInsert($current);
        echo "New record created\n";
    }
}
