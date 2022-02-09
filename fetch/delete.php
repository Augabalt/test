<?php
require_once '../vendor/autoload.php';

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);
$ids = $json_obj->ids;

$product = new App\Main\Db;
$product->deleteDataProduct($ids);
