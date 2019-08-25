<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/config.php';

require '../lib/framework/Core.php';

//$loader = require __DIR__ . '/../vendor/autoload.php';
//$loader->register();

use App\Client;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$transport = new \App\HttpTransportRates('2016-7-6');
$format = new \App\JsonSourceFormat();
$client = new Client($transport, $format);
$rates = $client->getRates();

$transport2 = new App\HttpTransportCurrency();
$request = Request::createFromGlobals();
$client2 = new Client($transport2, $format);
$currencies = $client2->getCurrencies();

$app = new Fwork\Core();

$app->map('/', function () {
    return new Response('home page');
});

$app->map('/about', function () {
    return new Response('about page');
});

$app->map('/hello/{name}/{age}/some', function ($name, $age) {
    return new Response('Hello '.$name. ' ' . $age);
});
$app->mapContr('/foo/{id}', array('id' => 1234,'_controller' => 'Lib\Controllers\PageController::show'), array('id' => '[0-9]+'));

//$foo_placeholder_route = new Route(
//    '/foo/{id}',
//    array('controller' => 'FooController', 'method'=>'show'),
//    array('id' => '[0-9]+')
//);

$response = $app->handle($request);

$response->setContent(include './layout.php');

$response->send();

