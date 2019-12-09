<?php


class Router
{
	private $routes;
	
	function __construct()
	{
		$routesPath = ROOT . '/config/routes.php';
		$this->routes = include($routesPath);
	}

	//returns request string
	private function getURI() {
		if (!empty($_SERVER['REQUEST_URI'])) {
			return trim($_SERVER['REQUEST_URI'], '/');
		}		
	}

	public function run()
	{
		$uri = $this->getURI();

		$exists = 0;

		foreach ($this->routes as $uriPattern => $path) {

			//Сравниваем $uriPattern с $uri
			if (preg_match("~^$uriPattern$~", $uri)) {

				//Получаем внутренние пути из внешнего по правилу
				$internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

				//Определяем контроллер, action, параметры
				$segments = explode('/', $internalRoute);

				$controllerName = ucfirst(array_shift($segments) . 'Controller');
				$actionName = 'action' . ucfirst(array_shift($segments));

				if ($actionName == 'action') {
					$actionName = 'actionIndex';
				}

				$id = $segments[0];//оставшийся элемент
				
				$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

				if (file_exists($controllerFile)) {
					include_once($controllerFile);

					$controllerObject = new $controllerName;
					$result = $controllerObject->$actionName($id);
					$exists++;

					if ($result != NULL) {
						break;
					}
				}

			}
		}

		//Если совпадений не найдено выводим 404ю
		if ($exists == 0)
		{
			include_once(ROOT . '/controllers/TaskController.php');
			$controllerObject = new TaskController;
			$controllerObject->actionNotFound();
		}
	}
}