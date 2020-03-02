<?php 

use \Cpw\Page;
use \Cpw\Model\User;
use \Cpw\Model\Customer;
use \Cpw\Model\Address;

$app->get('/customers', function() {
	
	User::verifyLogin();

	$customers = Customer::listAll();

	$page = new Page();

	$page->setTpl("customers", array(
		"customers"=>$customers
	));
});

$app->get('/customers/create', function() {
	
	User::verifyLogin();

	$page = new Page();

	$page->setTpl("customers-create");
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

	$page = new Page();

	$page->setTpl("customers-update", array(
		"customer"=>$customer->getValues(),
		"addresses"=>$addresses
	));
});

$app->post('/customers/create', function() {
	
	User::verifyLogin();

	$customer = new Customer();

	$customer->setData($_POST);

	$customer->save();

	header("Location: /customers");
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