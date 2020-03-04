<?php 

use \Cpw\Page;
use \Cpw\Model\User;
use \Cpw\Model\Customer;
use \Cpw\Model\Address;

$app->get('/customers', function() {
	
	User::verifyLogin();

	$search = (isset($_GET['search'])) ? $_GET['search'] : "";
	$pagenumber = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;

	if ($search != '') {
		$pagination = Customer::getPageSearch($search, $pagenumber, 10);
	} else {
		$pagination = Customer::getPage($pagenumber, 10);
	}

	$pages = [];

	for ($x = 0; $x < $pagination['pages']; $x++)
	{
		array_push($pages, [
			'href'=>'/customers?'.http_build_query([
				'page'=>$x+1,
				'search'=>$search
			]),
			'text'=>$x+1
		]);
	}

	$page = new Page("customers");

	$page->setTpl(array(
		"customers"=>$pagination['data'],
		"search"=>$search,
		"pages"=>$pages,
		"pagenumber"=>$pagenumber
	));
});



$app->get('/customers/create', function() {
	
	User::verifyLogin();

	$page = new Page("customers-create");

	$page->setTpl();
});

$app->get('/customers/:customerId/delete', function($customerId) {
	
	User::verifyLogin();

	$customer = new Customer();

	$customer->get((int)$customerId);

	$customer->delete();

	header("Location: /customers");
	exit;
});

$app->get('/customers/:customerId', function($customerId) {
	
	User::verifyLogin();
	
	$customer = new Customer();
	$customer->get((int)$customerId);

	$addresses = Address::listAll((int)$customerId);

	$page = new Page("customers-update");

	$page->setTpl(array(
		"customer"=>$customer->getValues(),
		"addresses"=>$addresses
	));

	$page->setPage("addresses"); 
});

$app->post('/customers/create', function() {
	
	User::verifyLogin();

	$customer = new Customer();

	$customer->setData($_POST);

	$customer->save();

	header("Location: /customers/".$customer->getid());
	exit;
});

$app->post('/customers/:customerId', function($customerId) {
	
	User::verifyLogin();

	$customer = new Customer();

  $customer->get((int)$customerId);

	$customer->setData($_POST);

	$customer->update();

	header("Location: /customers");
	exit;

});

 ?>