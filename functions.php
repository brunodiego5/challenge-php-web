<?php 

use \Cpw\Model\User;

function getUserName() {

	$user = User::getFromSession();

	return $user->getname();

}

function formatDate($date)
{

	return date('d/m/Y', strtotime($date));

}

function StrToDate($date)
{
	$dateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date);
	return $dateTime->format('Y-m-d');
}

?>