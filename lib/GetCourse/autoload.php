<?php
namespace GetCourse;
// GetCourse SDK autoloader.
// Предполагается, что вы будете использовать автозагрузчик composer
//
// Но если по какой-то причине вы не хотите использовать глобальный автозагрузчик,
// можно пользоваться данным автозагрузчиком
//
//  require_once "<путь>/GetCourse/autoload.php"
/**
 * @internal
 */
function autoload($name)
{
	if (\substr_compare($name, "GetCourse\\", 0, 10) !== 0) return;
	$stem = \substr($name, 10);
	$pathified_stem = \str_replace(array("\\", "_"), '/', $stem);
	$path = __DIR__ . "/" . $pathified_stem . ".php";
	if (\is_file($path)) {
		require_once $path;
	}
}
\spl_autoload_register('GetCourse\autoload');