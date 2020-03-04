<?php 

use \Cpw\Page;
use \Cpw\Model\User;

$app->get('/', function() {

	User::verifyLogin();

	header("Location: /customers");
	exit;
});

$app->get('/login', function() {

	$page = new Page("login", [
		"header"=>false,
		"footer"=>false
	]);	

	$page->setTpl();
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
	$pagenumber = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {
		$pagination = User::getPageSearch($search, $pagenumber, 10);
	} else {
		$pagination = User::getPage($pagenumber, 10);
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

	$page = new Page("users");

	$page->setTpl(array(
		"users"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"pagenumber"=>$pagenumber
	));
});

$app->get('/users/create', function() {
	
	User::verifyLogin();

	$page = new Page("users-create");

	$page->setTpl();
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

	$page = new Page("users-update");

	$page->setTpl(array(
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
	echo "<script>
  	toast.success('Usuário salvo com sucesso!');
    </script>";
	
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