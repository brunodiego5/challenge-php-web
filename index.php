<?php 

require_once("vendor/autoload.php");

$app = new \Slim\Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$sql = new Cpw\DB\Sql();

	$results = $sql->select("select * from users");

	echo json_encode($results);

});

$app->run();

 ?>