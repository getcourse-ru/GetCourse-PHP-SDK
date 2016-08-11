<?php
include 'bootstrap.php';

$user = new \GetCourse\User();

// Замените на ваш аккаунт
$user::setAccountName('account_name');
// Замените токен на сгенерированный вашим аккаунтом (http://{your_account}.getcourse.ru/saas/account/api)
$user::setAccessToken('secret_key');

try {
	$result = $user
		->setEmail('vasiliy.pupkin@getcourse.ru')
		->setFirstName('Василий')
		->setLastName('Пупкин')
		->setOverwrite()
		->setSessionReferer('http://getcourse.ru')
		->apiCall($action = 'add');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( $result );