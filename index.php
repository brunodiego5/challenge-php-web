<?php 
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Cpw\Page;
use \Cpw\PageAdmin;
use \Cpw\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/admin', function() {
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("index");
	
});

$app->get('/admin/login', function() {

	$page = new PageAdmin();

	$page->setTpl("login", [
		"header"=>false,
		"footer"=>false
	]);
	
});

$app->post('/admin/login', function() {

	User::login($_POST["login"], $_POST["password"]);

	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;
});

$app->get('/admin/users', function() {
	
	User::verifyLogin();

	$users = User::listAll();

	$page = new PageAdmin();

	$page->setTpl("users", array(
		"users"=>$users
	));
});

$app->get('/admin/users/create', function() {
	
	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");
});

$app->get('/admin/users/:userId/delete', function($userId) {
	
	User::verifyLogin();

	$user = new User();

	$user->get((int)$userId);

	$user->delete();

	header("Location: /admin/users");
	exit;



});

$app->get('/admin/users/:userId', function($userId) {
	
	User::verifyLogin();
	
	$user = new User();

	$user->get((int)$userId);

	$page = new PageAdmin();


	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

$app->post('/admin/users/create', function() {
	
	User::verifyLogin();

	$user = new User();

	/*parse */
	$_POST["isadmin"] = (isset($_POST["isadmin"])) ? 1 : 0;

	$_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);
	
	$user->setData($_POST);

	$user->save();

	header("Location: /admin/users");
	exit;
});

$app->post('/admin/users/:userId', function($userId) {
	
	User::verifyLogin();

	$user = new User();

 	/*parse */
  $_POST["isadmin"] = (isset($_POST["isadmin"])) ? 1 : 0;

	$user->get((int)$userId);

	$user->setData($_POST);

	$user->update();

	header("Location: /admin/users");
	exit;

});

$app->run();


 ?>