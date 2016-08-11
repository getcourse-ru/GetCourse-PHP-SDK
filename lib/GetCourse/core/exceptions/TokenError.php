<?php
namespace GetCourse\core\exceptions;

class TokenError extends \Exception
{
	public function __construct() {
		parent::__construct("Token is expired or incorrect", 401);
	}
}