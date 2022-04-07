<?php

include '../config.php';
include '../vendor/autoload.php';

$router = new \Core\Router();
$launcher = new \Core\Launcher();

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$launcher->start($router->getRouteInfo());
