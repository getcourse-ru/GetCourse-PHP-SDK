# GetCourse-PHP-SDK
Библиотека [GetCourse.ru](http://getcourse.ru) для доступа к API

Лицензия: Apache2

Системные требования:

  * PHP 8.0+
  * PHP cURL extension с поддержкой SSL (обычно включена).
  * PHP JSON extension

## Установка

Если вы используете [Composer](http://getcomposer.org/), то добавьте в свой "composer.json":

```
  "require": {
     "xdemonme/getcourse-php-sdk": "^0.0.2"
  }
```

и запустите `composer update` для установки

**или**

запустите эту команду в командной строке вашего проекта:

```shell
composer require xdemonme/getcourse-php-sdk
```

## Пример использования
Находится в директории ```sample```

# Документация протокола

## Протокол
Функции АПИ доступны только по ssl протоколу (https)

## Авторизация
Для авторизации необходимо передать секретный ключ как параметр key POST запроса

## Действие
Действие передается как параметр action POST запроса

## Параметры
Параметры в формате base64 кодированной JSON строки передаются как параметр params POST запроса

## Формат вызова импорта пользователя
Импорт пользователя находится по адресу ```https://{account_name}.getcourse.ru/pl/api/users```

Для добавления пользователя необходимо передать действие add, секретный ключ и параметры добавляемого пользователя:
```curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/users" --data "action=add&key={secret_key}&params={params}"```

Параметры пользователя:

		base64_encode(
			{
				"user":{
					"email":"email",
					"phone":"телефон",
					"first_name":"имя",
					"last_name":"фамилия",
					"city":"город",
					"country":"страна",
					"group_name":["Группа1","Группа2"], // для добавления пользователя в группу
					"addfields":{"Доп.поле1":"значение","Доп.поле2":"значение"} // для добавления дополнительных полей пользователя
				},
				"system":{
					"refresh_if_exists":0, // обновлять ли существующего пользователя 1/0 да/нет
					"partner_email":"email партнера",
					"multiple_offers":0, // добавлять несколько предложений в заказ 1/0
					"return_payment_link":0 // возвращать ссылку на оплату 1/0
				},
				"session":{
					"utm_source":"",
					"utm_medium":"",
					"utm_content":"",
					"utm_campaign":"",
					"utm_group":"",
					"gcpc":"",
					"gcao":"",
					"referer":"",
				}
			});
			

## Формат вызова импорта сделки
Импорт сделки находится по адресу https://{account_name}.getcourse.ru/pl/api/deals

Для добавления сделки необходимо передать действие add, секретный ключ и параметры добавляемого пользователя и сделки:
```curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/deals" --data "action=add&key={secret_key}&params={params}"```

Параметры сделки должны включать параметры пользователя и дополнительно параметры сделки с ключом deal:

		base64_encode(
			{
				"user":{
					// как в импорте пользователя
				},
				"system":{
					// как в импорте пользователя
				},
				"session":{
					// как в импорте пользователя
				},
				"deal":{
					"deal_number":"номер заказа",
					"offer_code":"уникальный код предложения",
					"product_title":"наименование предложения",
					"product_description":"описание предложения",
					"quantity":1, // количество
					"deal_cost":"сумма заказа",
					"deal_is_paid":"оплачен да/нет"
					"manager_email":"email менеджера",
					"deal_created_at":"дата заказа",
					"deal_finished_at":"дата оплаты/завершения заказа",
					"deal_comment":"комментарий",
					"payment_type":"тип платежа из списка",
					"payment_status":"статус платежа из списка",
					"addfields":{"Доп.поле1":"значение","Доп.поле2":"значение"} // для добавления дополнительных полей заказа
				}
			});
			
## Формат вызова отправки сообщения
Отправка сообщения находится по адресу https://{account_name}.getcourse.ru/pl/api/messages

Для добавления сделки необходимо передать действие send, секретный ключ и параметры отправляемого сообщения:
```curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/messages" --data "action=send&key={secret_key}&params={params}"```

Параметры отправляемого сообщения должны включать:

		base64_encode(
			{
				"message":{
					"email":"email пользователя",
					"transport":"email", // тип транспорта
					"mailing_id":"id рассылки",
					"params":{"поле шаблона 1":"значение","поле шаблона 2":"значение"} // можно переопределить поля шаблона, например first_name
				}
			});
		
## Формат ответа
Ответ возвращается в формате JSON:

			{
				"success":"true/false", // результат вызова
				"action":"вызванное действие",
				"result":{
					"success":"true/false", // результат действия
					"user_id":"id пользователя",
					"user_status":"статус пользователя",
					"error_message":"сообщение об ошибке",
					"error":"true/false", // наличие ошибок
				}
			}
			


