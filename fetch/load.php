<?php
require_once '../vendor/autoload.php';

$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);

$sku = clean ($input ['sku']);
$name = clean ($input ['name']);
$price = $input ['price'];
$pt = $input ['pt'];
$size = $input ['size'];
$weight = $input ['weight'];
$height = $input ['height'];
$width = $input ['width'];
$length = $input ['length'];

function abc($product, $sku, $name, $price, $pt, $size, $weight, $height, $width, $length){
    $product -> sku = $sku;
    $product -> name = $name;
    $product -> price = $price;
    $product -> pt = $pt;
    $product -> size = $size;
    $product -> weight = $weight;
    $product -> height = $height;
    $product -> width = $width;
    $product -> length = $length;

}

if ($pt == 1){
    $product = new App\Other\Dvd;
    abc($product, $sku, $name, $price, $pt, $size, $weight, $height, $width, $length);
    $product -> loadData();

}

if ($pt == 2){
    $product = new App\Other\Book;
    abc($product, $sku, $name, $price, $pt, $size, $weight, $height, $width, $length);
    $product -> loadData();

}

if ($pt == 3){
    $product = new App\Other\Furniture;
    abc($product, $sku, $name, $price, $pt, $size, $weight, $height, $width, $length);
    $product -> loadData();

}



// Clean values
function clean($value = ""){

    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}
