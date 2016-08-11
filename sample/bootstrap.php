<?php
/*
 * Пример bootstrap файла.
 */

// Включаем автозагрузчик composer
$composerAutoload = dirname(dirname(dirname(__DIR__))) . '/autoload.php';
if (!file_exists($composerAutoload)) {
	// Если это основа проекта, то используем автозагрузчик sdk
	$composerAutoload = dirname(__DIR__) . '/vendor/autoload.php';

	if (!file_exists($composerAutoload)) {
		echo "Отсутствует автозагрузчик. Пожалуйста запустите 'composer update' чтобы установить необходимые компоненты.\nПожалуйста прочитайте README для информации.\n";
		exit(1);
	}
}
require $composerAutoload;

// Убираем DateTime предупреждения
date_default_timezone_set(@date_default_timezone_get());

// Включаем error_reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
