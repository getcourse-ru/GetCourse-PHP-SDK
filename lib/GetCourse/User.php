<?php

namespace GetCourse;

use GetCourse\core\Model;

/**
 * Класс User
 * для добавления пользователя
 *
 * @package GetCourse
 *
 * @property array user
 * @property array system
 * @property array session
 */
class User extends Model
{

	/**
	 * Email пользователя
	 * @param $email
	 * @return $this
	 */
	public function setEmail($email) {
		$this->user['email'] = $email;
		return $this;
	}

	/**
	 * Телефон пользователя
	 * @param $phone
	 * @return $this
	 */
	public function setPhone($phone) {
		$this->user['phone'] = $phone;
		return $this;
	}

	/**
	 * Имя пользователя
	 * @param $first_name
	 * @return $this
	 */
	public function setFirstName($first_name) {
		$this->user['first_name'] = $first_name;
		return $this;
	}

	/**
	 * Фамилия пользователя
	 * @param $last_name
	 * @return $this
	 */
	public function setLastName($last_name) {
		$this->user['last_name'] = $last_name;
		return $this;
	}

	/**
	 * Город пользователя
	 * @param $city
	 * @return $this
	 */
	public function setCity($city) {
		$this->user['city'] = $city;
		return $this;
	}

	/**
	 * Страна пользователя
	 * @param $country
	 * @return $this
	 */
	public function setCountry($country) {
		$this->user['country'] = $country;
		return $this;
	}

	/**
	 * Дата/время создания пользователя
	 * @param $created_at
	 * @return $this
	 */
	public function setCreatedAt($created_at) {
		$this->user['created_at'] = $created_at;
		return $this;
	}

	/**
	 * Дополнительные поля пользователя
	 * @param $name
	 * @param $value
	 * @return $this
	 */
	public function setUserAddField($name, $value) {
		$this->user['addfields'][$name] = $value;
		return $this;
	}

	/**
	 * Добавляет группы пользователя
	 * @param $group
	 * @return $this
	 */
	public function setGroup( $group ) {
		$this->user['group_name'][] = $group;
		return $this;
	}

	/**
	 * Разрешить перезаписывать пользователя если он существует
	 * @return $this
	 */
	public function setOverwrite() {
		$this->system['refresh_if_exists'] = 1;
		return $this;
	}


	/**
	 * Разрешить добавлять несколько предложений в заказ
	 * @return $this
	 */
	public function setMultipleOffers() {
		$this->system['multiple_offers'] = 1;
		return $this;
	}

	/**
	 * Возвращать ссылку на оплату
	 * @return $this
	 */
	public function setReturnPaymentLink() {
		$this->system['return_payment_link'] = 1;
		return $this;
	}

	/**
	 * Добавить партнера пользователя
	 * @param $partnerEmail
	 * @return $this
	 */
	public function setPartnerEmail($partnerEmail) {
		$this->system['partner_email'] = $partnerEmail;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_source
	 * @return $this
	 */
	public function setSessionUtmSource($utm_source) {
		$this->session['utm_source'] = $utm_source;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_medium
	 * @return $this
	 */
	public function setSessionUtmMedium($utm_medium) {
		$this->session['utm_medium'] = $utm_medium;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_campaign
	 * @return $this
	 */
	public function setSessionUtmCampaign($utm_campaign) {
		$this->session['utm_campaign'] = $utm_campaign;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_content
	 * @return $this
	 */
	public function setSessionUtmContent($utm_content) {
		$this->session['utm_content'] = $utm_content;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_term
	 * @return $this
	 */
	public function setSessionUtmTerm($utm_term) {
		$this->session['utm_term'] = $utm_term;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $utm_group
	 * @return $this
	 */
	public function setSessionUtmGroup($utm_group) {
		$this->session['utm_group'] = $utm_group;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $gcpc
	 * @return $this
	 */
	public function setSessionGcpc($gcpc) {
		$this->session['gcpc'] = $gcpc;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $gcao
	 * @return $this
	 */
	public function setSessionGcao($gcao) {
		$this->session['gcao'] = $gcao;
		return $this;
	}

	/**
	 * Параметры сессии
	 * @param $referer
	 * @return $this
	 */
	public function setSessionReferer($referer) {
		$this->session['referer'] = $referer;
		return $this;
	}

	/**
	 * Вызов api
	 * @param $action
	 * @return mixed
	 */
	public function apiCall( $action ) {
		return $this->executeCall(self::getUrl().'users', $action);
	}
}
