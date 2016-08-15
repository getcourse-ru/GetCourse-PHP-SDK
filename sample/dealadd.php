<?php
include 'bootstrap.php';

/*
 * Если вы не пользуетесь composer, то можно использовать include
include './lib/GetCourse/core/Core.php';
include './lib/GetCourse/core/Model.php';
include './lib/GetCourse/core/exceptions/FormatError.php';
include './lib/GetCourse/core/exceptions/ServerError.php';
include './lib/GetCourse/core/exceptions/TokenError.php';
include './lib/GetCourse/User.php';
include './lib/GetCourse/Deal.php';
*/

$deal = new \GetCourse\Deal();

// Замените на ваш аккаунт
$deal::setAccountName('account_name');
// Замените токен на сгенерированный вашим аккаунтом (http://{your_account}.getcourse.ru/saas/account/api)
$deal::setAccessToken('secret_key');

try {
	$result = $deal
		->setEmail('vasiliy.pupkin@getcourse.ru')
		->setFirstName('Василий')
		->setLastName('Пупкин')
		->setUserAddField('Почтовый адрес', 'New Васюки')
		->setOverwrite()
		->setSessionReferer('http://getcourse.ru')
		->setProductTitle('Как заработать первый доллар')
		->setDealNumber('30046')
		->setDealCost(64.24)
		->setDealAddField('Таможенная стоимость', '10')
		->apiCall($action = 'add');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( $result );