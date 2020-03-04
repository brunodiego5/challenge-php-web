<?php 

use \Cpw\Page;
use \Cpw\Model\User;
use \Cpw\Model\Customer;
use \Cpw\Model\Address;

$app->get('/customers/:customerId/addresses/create', function($customerId) {
	
	User::verifyLogin();

  $page = new Page("addresses-create");
  
  $customer = new Customer();
  $customer->get((int)$customerId);

	$page->setTpl(array(
		"customer"=>$customer->getValues()
  ));
});

$app->get('/customers/:customerId/addresses/:addressId/delete', function($customerId, $addressId) {
	
	User::verifyLogin();

	$address = new Address();

	$address->get((int)$addressId);

	$address->delete();

	header("Location: /customers/".$customerId);
	exit;
});

$app->get('/customers/:customerId/addresses/:addressId', function($customerId, $addressId) {
	
  User::verifyLogin();
  
  $customer = new Customer();
  $customer->get((int)$customerId);
	
	$address = new Address();
	$address->get((int)$addressId);

	$page = new Page("addresses-update");

	$page->setTpl(array(
    "customer"=>$customer->getValues(),
		"address"=>$address->getValues()
	));
});

$app->post('/customers/:customerId/addresses/create', function($customerId) {
	
	User::verifyLogin();

  $address = new Address();
  $_POST['customer_id'] = $customerId;
  if (!$_POST['complement']) $_POST['complement'] = "";

	$address->setData($_POST);

	$address->save();

	header("Location: /customers/".$customerId);
	exit;
});

$app->post('/customers/:customerId/addresses/:addressId', function($customerId, $addressId) {
	
	User::verifyLogin();

	$address = new Address();

  $address->get((int)$addressId);

	$address->setData($_POST);

	$address->update();

	header("Location: /customers/".$customerId);
	exit;

});

 ?>