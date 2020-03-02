<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;

$app = new Slim();

$app->config('debug', true);

require_once("user.php");
require_once("customer.php");
require_once("address.php");

$app->run();


 ?>