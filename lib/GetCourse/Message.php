<?php

namespace GetCourse;

use GetCourse\core\Model;

/**
 * Класс Message
 * для отправки рассылки
 *
 * @package GetCourse
 *
 * @property array message
 */
class Message extends Model
{

	/**
	 * Email пользователя
	 * @param $email
	 * @return $this
	 */
	public function setEmail($email) {
		$this->message['email'] = $email;
		return $this;
	}

	/**
	 * Транспорт рассылки
	 * поддерживаемые параметры: 'email'
	 * @param $transport
	 * @return $this
	 */
	public function setTransport($transport) {
		$this->message['transport'] = $transport;
		return $this;
	}

	/**
	 * Id рассылки
	 * @param $mailingId
	 * @return $this
	 */
	public function setMailingId($mailingId) {
		$this->message['mailing_id'] = $mailingId;
		return $this;
	}

	/**
	 * Дополнительные поля сообщения
	 * @param $name
	 * @param $value
	 * @return $this
	 */
	public function setMessageParams($name, $value) {
		$this->message['params'][$name] = $value;
		return $this;
	}

	/**
	 * Вызов api
	 * @param $action
	 * @return mixed
	 */
	public function apiCall( $action ) {
		return $this->executeCall(self::getUrl().'messages', $action);
	}
}
