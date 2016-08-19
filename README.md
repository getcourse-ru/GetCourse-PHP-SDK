# GetCourse-PHP-SDK
Библиотека [GetCourse.ru](http://getcourse.ru) для доступа к API

Лицензия: Apache2

Системные требования:

  * PHP 5.4+
  * PHP cURL extension с поддержкой SSL (обычно включена).
  * PHP JSON extension

##Установка

Если вы используете [Composer](http://getcomposer.org/), то добавьте в свой "composer.json":

```
"require": {
  "getcourse-ru/GetCourse-PHP-SDK": "*"
}
```
##Пример использования
Находится в директории sample

#Документация протокола
##Протокол
Функции АПИ доступны только по ssl протоколу (https)
##Авторизация
Для авторизации необходимо передать секретный ключ как параметр key POST запроса
##Действие
Действие передается как параметр action POST запроса
##Параметры
Параметры в формате base64 кодированной JSON строки передаются как параметр params POST запроса
##Формат вызова импорта пользователя
Импорт пользователя находится по адресу https://{account_name}.getcourse.ru/pl/api/users
Для добавления пользователя необходимо передать действие add, секретный ключ и параметры добавляемого пользователя:
curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/users" --data "action=add&key={secret_key}&params={params}"
Параметры пользователя:

		base64_encode(
			{
				{"user":{
					"email":{email},
					"phone":{телефон},
					//... другие параметры пользователя
					"addfields":{"Доп. поле":{значение},}
				},
				"system":{
					"refresh_if_exists":{1/0}, // обновлять ли существующего пользователя
					"partner_email":{email партнера}
				},
				"session":{
					"utm_source":{},
					"utm_medium":{},
					"utm_content":{},
					"utm_campaign":{},
					"utm_group":{},
					"gcpc":{},
					"gcao":{},
					"referer":{},
					//... другие параметры сессии
				},
			});
			

##Формат вызова импорта сделки
Импорт сделки находится по адресу https://{account_name}.getcourse.ru/pl/api/deals
Для добавления сделки необходимо передать действие add, секретный ключ и параметры добавляемого пользователя и сделки:
curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/deals" --data "action=add&key={secret_key}&params={params}"
Параметры сделки должны включать параметры пользователя и дополнительно параметры сделки с ключом deal
##Формат вызова отправки сообщения
Отправка сообщения находится по адресу https://{account_name}.getcourse.ru/pl/api/messages
Для добавления сделки необходимо передать действие send, секретный ключ и параметры отправляемого сообщения:
curl -i -H "Accept: application/json; q=1.0, */*; q=0.1" "https://{account_name}.getcourse.dev/pl/api/deals" --data "action=add&key={secret_key}&params={params}"
Параметры отправляемого мообщения должны включать:
		base64_encode(
			{
				{"message":{
					"email":{email пользователя},
					"transport":{тип транспорта, поддерживаемые: "email"},
					"mailing_id":{id рассылки},
					"params":{"поле шаблона":{значение},} //можно переопределить поля шаблона, например first_name
				},
			});
##Формат ответа
Ответ возвращается в формате JSON:

				{
					"success":{true/false}, // результат вызова
					"action":{вызванное действие},
					"result":{
						"success":{true/false}, // результат действия
						"user_id":{id пользователя},
						"user_status":{статус пользователя},
						"error_message":{сообщение об ошибке},
						"error":{true/false}, // наличие ошибок
					}
				}
			


