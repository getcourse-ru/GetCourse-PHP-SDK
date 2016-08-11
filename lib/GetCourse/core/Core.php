<?php
namespace GetCourse\core;


use GetCourse\core\exceptions\FormatError;
use GetCourse\core\exceptions\ServerError;
use GetCourse\core\exceptions\TokenError;

class Core
{
	public static function sendRequest($url, $action, $params = array(), $access_token = NULL) {

		if(strpos($url, "https") === false) {
			throw new FormatError;
		}

		if(!$access_token) {
			throw new TokenError;
		}

		$curl = curl_init($url);

		$options = [];
		$options['key'] = $access_token;
		$options['action'] = $action;
		$options['params'] = base64_encode(json_encode($params));

		curl_setopt ($curl, CURLOPT_USERAGENT, 'GETCOURSE-PHP-SDK');
		curl_setopt ($curl, CURLOPT_POST, 1);
		$query = http_build_query($options);
		curl_setopt ($curl, CURLOPT_POSTFIELDS, $query);
		curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		//curl_setopt($curl, CURLOPT_VERBOSE, 1);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 0);
		$body = curl_exec ($curl);

		$result = new \StdClass();
		$result->status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		$result->body = $body;
		curl_close ($curl);

		return self::processResult($result);
	}

	protected static function processResult($result) {
		switch ($result->status_code) {
			case 400:
				throw new FormatError();
				break;
			case 401:
				throw new TokenError();
				break;
			default:
				if($result->status_code >= 500) {
					throw new ServerError($result->status_code);
				}
				else {
					return json_decode($result->body);
				}
		}
	}
}
