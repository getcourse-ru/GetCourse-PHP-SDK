<?php

namespace GetCourse\core;


/**
 * Основной класс для API объектов
 */
class Model
{
	private $_propMap = array(
		'user'=>[],
		'system'=>[],
		'session'=>[],
		'deal'=>[],
		'message'=>[],
	);

	/*
	 * Секретный ключ
	 */
	private static $accessToken = 0;
	/*
	 * Название аккаунта GetCourse
	 */
	private static $accountName = '';

	public static function setAccessToken($accessToken)	{
		self::$accessToken = $accessToken;
	}

	public static function setAccountName($accountName)	{
		self::$accountName = $accountName;
	}

	public static function getUrl() {
		if(!self::$accountName) {
			throw new \Exception("Account name not supplied");
		}
		return 'https://' . self::$accountName . '.getcourse.ru/pl/api/';
	}

	/**
	 * Magic Get Method
	 *
	 * @param $key
	 * @return mixed
	 */
	public function &__get($key)
	{
		if ($this->__isset($key)) {
			return $this->_propMap[$key];
		}
		return null;
	}

	/**
	 * Magic Set Method
	 *
	 * @param $key
	 * @param $value
	 */
	public function __set($key, $value)
	{
		if (!is_array($value) && $value === null) {
			$this->__unset($key);
		} else {
			$this->_propMap[$key] = $value;
		}
	}

	/**
	 * Magic isSet Method
	 *
	 * @param $key
	 * @return bool
	 */
	public function __isset($key)
	{
		return isset($this->_propMap[$key]);
	}

	/**
	 * Magic Unset Method
	 *
	 * @param $key
	 */
	public function __unset($key)
	{
		unset($this->_propMap[$key]);
	}

	/**
	 * Конвертирует параметры в массив
	 *
	 * @param $param
	 * @return array
	 */
	private function _convertToArray($param)
	{
		$ret = array();
		if (!$param || empty($param)) {
			return $ret;
		}
		foreach ($param as $k => $v) {
			if ($v instanceof Model) {
				$ret[$k] = $v->toArray();
			} elseif (is_array($v) && sizeof($v) <= 0) {
				$ret[$k] = array();
			} elseif (is_array($v)) {
				$ret[$k] = $this->_convertToArray($v);
			} else {
				$ret[$k] = $v;
			}
		}
		if (sizeof($ret) <= 0) {
			$ret = new Model();
		}
		return $ret;
	}

	/**
	 * Возвращает представление объекта в виде массива
	 *
	 * @return array
	 */
	public function toArray()
	{
		return $this->_convertToArray($this->_propMap);
	}

	/**
	 * Возвращает представление объекта как JSON
	 *
	 * @param int $options http://php.net/manual/en/json.constants.php
	 * @return string
	 */
	public function toJSON($options = 0)
	{
		return json_encode($this->toArray(), $options | 64);
	}

	/**
	 * Magic Method for toString
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->toJSON(128);
	}

	/**
	 * Api вызов
	 * @param $url
	 * @param $action
	 * @return mixed
	 * @throws \Exception
	 */
	protected function executeCall($url, $action)
	{
		if(!self::$accessToken) {
			throw new \Exception("Access token not supplied");
		}

		return Core::sendRequest($url, $action, $this->toArray(), self::$accessToken);
	}
}
