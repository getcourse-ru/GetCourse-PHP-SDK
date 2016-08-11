<?php
namespace GetCourse\core\exceptions;

class FormatError extends \Exception
{
	public function __construct() {
		parent::__construct(
			"Request is missformated", 400
		);
	}
}