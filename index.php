<?php

require 'vendor/autoload.php';

$client = new GuzzleHttp\Client();
$response = $client->get('http://auto.ria.com/last/visit/', ['verify' => false, 'cookies' => ['last_auto_id' => 15218168]]);

var_export($response->getBody());

//echo $response->getBody();