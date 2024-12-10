<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../bootstrap.php";

use AP52\Core\Dispatcher;
use AP52\Core\Request;
use AP52\Core\RouteCollection;

$route = new RouteCollection();
$request = new Request();
$dispatcher = new Dispatcher($route,$request,$entityManager);
