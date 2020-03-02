<?php 

use \Cpw\Page;
use \Cpw\Model\User;

$app->get('/', function() {

	User::verifyLogin();

	$page = new Page();

	$page->setTpl("index");

});

$app->get('/login', function() {

	$page = new Page([
		"header"=>false,
		"footer"=>false
	]);

	$page->setTpl("login");
	
});

$app->post('/login', function() {

	User::login($_POST["email"], $_POST["password"]);

	header("Location: /");
	exit;
});

$app->get('/logout', function() {

	User::logout();

	header("Location: /login");
	exit;
});

$app->get('/users', function() {
	
	User::verifyLogin();

	$users = User::listAll();

	$page = new Page();

	$page->setTpl("users", array(
		"users"=>$users
	));
});

$app->get('/users/create', function() {
	
	User::verifyLogin();

	$page = new Page();

	$page->setTpl("users-create");
});

$app->get('/users/:userId/delete', function($userId) {
	
	User::verifyLogin();

	$user = new User();

	$user->get((int)$userId);

	$user->delete();

	header("Location: /users");
	exit;



});

$app->get('/users/:userId', function($userId) {
	
	User::verifyLogin();
	
	$user = new User();

	$user->get((int)$userId);

	$page = new Page();


	$page->setTpl("users-update", array(
		"user"=>$user->getValues()
	));
});

$app->post('/users/create', function() {
	
	User::verifyLogin();

	$user = new User();

	/*parse */
	$_POST['password'] = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost"=>12
	]);
	
	$user->setData($_POST);

	$user->save();

	header("Location: /users");
	exit;
});

$app->post('/users/:userId', function($userId) {
	
	User::verifyLogin();

	$user = new User();

  $user->get((int)$userId);

	$user->setData($_POST);

	$user->update();

	header("Location: /users");
	exit;

});

 ?>