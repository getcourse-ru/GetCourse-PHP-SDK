<?php
namespace GetCourse\core\exceptions;

class ServerError extends \Exception
{
	public function __construct($status_code) {
		parent::__construct("Server error", $status_code);
	}
}