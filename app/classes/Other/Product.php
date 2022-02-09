<?php

namespace App\Other;

use App\Main\Db;

abstract class Product extends Db
{

    abstract function readData();

    abstract function loadData();
}
