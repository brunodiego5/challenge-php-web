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

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {
		$pagination = User::getPageSearch($search, $page, 10);
	} else {
		$pagination = User::getPage($page, 10);
	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages, [
			'href'=>'/users?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new Page();

	$page->setTpl("users", array(
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages
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