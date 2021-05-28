<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Controller;
use App\Entity;

require_once "Autoload.php";
Autoload::register();

$router = new Router();
$router->process();

