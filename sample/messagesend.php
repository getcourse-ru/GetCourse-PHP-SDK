#!/usr/bin/env php
<?php
require_once __DIR__.'/../sample/bootstrap.php';

// Если вы не используете composer, то можно использовать include
// require_once __DIR__.'/../lib/GetCourse/autoload.php';

$message = new \GetCourse\Message();

// Замените на ваш аккаунт
$message::setAccountName('account_name');
// Замените токен на сгенерированный вашим аккаунтом (http://{your_account}.getcourse.ru/saas/account/api)
$message::setAccessToken('secret_key');

try {
	$result = $message
		->setTransport('email')
		->setEmail('vasiliy.pupkin@getcourse.ru')
		->setMailingId(13672)
		->setMessageParams('first_name', 'Уважаемый Василий Алибабаевич')
		->apiCall($action = 'send');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( $result );