<?php

namespace GetCourse;

use GetCourse\core\Model;

/**
 * Класс Deal
 * для добавления заказа
 *
 * @package GetCourse
 *
 * @property array user
 * @property array system
 * @property array session
 * @property array deal
 */
class Deal extends User
{

	/**
	 * Номер заказа
	 * @param $deal_number
	 * @return $this
	 */
	public function setDealNumber($deal_number) {
		$this->deal['deal_number'] = $deal_number;
		return $this;
	}
	
	/**
	 * Статус заказа
	 * @param $deal_status
	 * @return $this
	 */
	public function setDealStatus($deal_status) {
		$this->deal['deal_status'] = $deal_status;
		return $this;
	}

	/**
	 * Количество
	 * @param $quantity
	 * @return $this
	 */
	public function setQuantity($quantity) {
		$this->deal['quantity'] = $quantity;
		return $this;
	}

	/**
	 * Email менеджера
	 * @param $manager_email
	 * @return $this
	 */
	public function setManager($manager_email) {
		$this->deal['manager_email'] = $manager_email;
		return $this;
	}

	/**
	 * Дата заказа
	 * @param $date_created_at
	 * @return $this
	 */
	public function setDateCreated($date_created_at) {
		$this->deal['deal_created_at'] = $date_created_at;
		return $this;
	}

	/**
	 * Дата оплаты/завершения заказа
	 * @param $date_created_at
	 * @return $this
	 */
	public function setDateFinished($date_finished_at) {
		$this->deal['deal_finished_at'] = $date_finished_at;
		return $this;
	}

	/**
	 * Сумма заказа
	 * @param $deal_cost
	 * @return $this
	 */
	public function setDealCost($deal_cost) {
		$this->deal['deal_cost'] = $deal_cost;
		return $this;
	}

	/**
	 * Наименование предложения
	 * @param $deal_cost
	 * @return $this
	 */
	public function setProductTitle($product_title) {
		$this->deal['product_title'] = $product_title;
		return $this;
	}

	/**
	 * Описание предложения
	 * @param $product_description
	 * @return $this
	 */
	public function setProductDescription($product_description) {
		$this->deal['product_description'] = $product_description;
		return $this;
	}

	/**
	 * Уникальный код предложения
	 * @param $offer_code
	 * @return $this
	 */
	public function setOfferCode($offer_code) {
		$this->deal['offer_code'] = $offer_code;
		return $this;
	}

	/**
	 * Оплачен (да/нет)
	 * @param $deal_is_paid
	 * @return $this
	 */
	public function setDealIsPaid($deal_is_paid) {
		$this->deal['deal_is_paid'] = $deal_is_paid;
		return $this;
	}

	/**
	 * Комментарий
	 * @param $deal_comment
	 * @return $this
	 */
	public function setDealComment($deal_comment) {
		$this->deal['deal_comment'] = $deal_comment;
		return $this;
	}

	/**
	 * Тип платежа
	 * @param $payment_type
	 * @return $this
	 */
	public function setPaymentType($payment_type) {
		$this->deal['payment_type'] = $payment_type;
		return $this;
	}

	/**
	 * Статус платежа
	 * @param $payment_status
	 * @return $this
	 */
	public function setPaymentStatus($payment_status) {
		$this->deal['payment_status'] = $payment_status;
		return $this;
	}

	/**
	 * Дополнительные поля заказа
	 * @param $name
	 * @param $value
	 * @return $this
	 */
	public function setDealAddField($name, $value) {
		$this->deal['addfields'][$name] = $value;
		return $this;
	}

	/**
	 * Добавить партнера заказа
	 * @param $partnerEmail
	 * @return $this
	 */
	public function setDealPartnerEmail($partnerEmail) {
		$this->deal['partner_email'] = $partnerEmail;
		return $this;
	}

	/**
	 * Вызов api
	 * @param $action
	 * @return mixed
	 */
	public function apiCall( $action ) {
		return $this->executeCall(self::getUrl().'deals', $action);
	}
}
