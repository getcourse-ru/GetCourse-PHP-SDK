#!/usr/bin/env php
<?php
require_once __DIR__.'/../sample/bootstrap.php';

// Если вы не пользуетесь composer, то можно использовать include
// require_once __DIR__.'/../lib/GetCourse/autoload.php';

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
		->setUserAddField('Почтовый адрес', 'New Васюки')
		->setOverwrite()
		->setSessionReferer('http://getcourse.ru')
		->apiCall($action = 'add');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( $result );