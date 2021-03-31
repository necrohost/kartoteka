<?php
namespace App\Services;

class Router
{
	private static $list = [];

	//добавляет роут в массив
	public static function route($uri, $class_name, $action)
	{
		self::$list[] = [
			"uri" => $uri,
			"class" => $class_name,
			"action" => $action,
		];
	}

	//инициализирует экшн в контроллере
	public static function enableAction()
	{

		$query = $_SERVER['REQUEST_URI'];
		if(strpos($query, "?") == true) {
			$query = substr_replace($query, "", strpos($query, "?"));
		}
		
		foreach (self::$list as $route) {
			if ($route['uri'] === $query){
				$className = '\\App\\Controllers\\' . ucfirst($route['class']);
				try {
					$controller = new $className;
					if(method_exists($controller, $route['action'])){
						if($_GET['id']){
							$id = $_GET['id'];
							$result = $controller->{$route['action']}($id);
						} else {
							$result = $controller->{$route['action']}();
						}
						return $result;
					} else {
						echo 'not found action in controller';
					}
				} catch (Exception $e) {
					echo $e->getMessage();;
				}
			} //else {
			// 	echo "not $route[uri] in query";
			// }
		}
		self::notFound();
	}
	
	private static function notFound()
	{
		require_once 'views/errors/404.php';
	}
}