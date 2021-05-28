<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "Autoload.php";
Autoload::register();

use Entity\Product;
use Controller\HomeController;

$product = new Product();
$controller = new HomeController();

var_dump($product);
var_dump($controller);

