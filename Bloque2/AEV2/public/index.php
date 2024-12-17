<?php

require_once "../vendor/autoload.php";
require_once __DIR__ . "/../bootstrap.php";

use AEV2\Core\Dispatcher;
use AEV2\Core\Request;
use AEV2\Core\RouteCollection;

$route = new RouteCollection();
$request = new Request();
$dispatcher = new Dispatcher($route,$request, $entityManager);

