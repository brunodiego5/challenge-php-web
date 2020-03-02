<?php 

use \Cpw\Model\User;

function getUserName() {

	$user = User::getFromSession();

	return $user->getname();

}

?>