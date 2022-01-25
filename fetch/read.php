<?php

include '../Product.php';

$test = new Db();
$test->createTableCategory();
$test->createTableProduct();

$dvd = new Dvd();
$dvd -> readData();

$book = new Book();
$book -> readData();

$furniture = new Furniture();
$furniture -> readData();

?>
