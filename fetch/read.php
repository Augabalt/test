<?php
require_once '../vendor/autoload.php';

$test = new App\Main\Db;

$test = new App\Main\Db;
$test->createTableCategory();
$test->createTableProduct();

$dvd = new App\Other\Dvd;
$dvd -> readData();

$book = new App\Other\Book;
$book -> readData();

$furniture = new App\Other\Furniture;
$furniture -> readData();
