<?php
namespace GetCourse\core\Exceptions;

class APIException extends \Exception {

}

class FormatError extends APIException {
	public function __construct() {
		parent::__construct(
			"Request is missformated", 400
		);
	}
}

class TokenError extends APIException {
	public function __construct() {
		parent::__construct("Token is expired or incorrect", 401);
	}
}

class ServerError extends APIException {
	public function __construct($status_code) {
		parent::__construct("Server error", $status_code);
	}
}
