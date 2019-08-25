<?php

use App\Client;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config.php';

//$loader = require __DIR__ . '/../vendor/autoload.php';
//$loader->register();



$transport = new \App\HttpTransportRates('2016-7-6');
$format = new \App\JsonSourceFormat();
$client = new Client($transport, $format);
$rates = $client->getRates();

$transport2 = new App\HttpTransportCurrency();

$client2 = new Client($transport2, $format);
$currencies = $client2->getCurrencies();

include './layout.php';


