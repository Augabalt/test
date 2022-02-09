<?php
require_once __DIR__ . '/vendor/autoload.php';

define('URL', 'https://test.arbuus.ee/');

$route = new App\Main\Router;
$route->setRoute("addproduct", "page/addproduct.html");

if (!$route->route()) {
    echo 'Route not set';
}
