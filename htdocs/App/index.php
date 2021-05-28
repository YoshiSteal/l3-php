<?php

require_once "Autoload.php";
Autoload::register();

use App\Entity\Product;
use App\App\HomeController;

$product = new Product();
$controller = new HomeController();

var_dump($product);

