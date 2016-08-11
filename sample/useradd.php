<?php
include 'bootstrap.php';

$user = new \GetCourse\User();

$user::setAccountName('test');
$user::setAccessToken($key);

try {
	$result = $user
		->setEmail('vasiliy.pupkin@getcourse.ru')
	/*	->setFirstName('Василий')
		->setLastName('Пупкин')
		->setOverwrite()
		->setSessionReferer('http://getcourse.ru')*/
		->apiCall($action = 'add');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( json_decode( $result ) );