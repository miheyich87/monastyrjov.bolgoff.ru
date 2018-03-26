<?php
class Route
{
    static function start()
    {
		// controller
		$controller_name = 'Main';
		$action_name = 'index';
		$request = null;
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// current controller
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// current action
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		
		if (($action_name == "edit") || ($action_name == "view") || ($action_name == "delete"))
			if ( !empty($routes[3]) )
			{
				$request = $routes[3];
			}
			else
				Route::ErrorPage404();

		// prefix
		$model_name = $controller_name;
		$controller_name = $controller_name;
		$action_name = 'action_'.$action_name;

		// include nodel file (if exists)
		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/models/".$model_file;
		}

		// include controller file
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		
		if (file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}
		else
			Route::ErrorPage404();
		
		// creat controller object
		$controller_class = "Controller_".$controller_name;
		$controller = new $controller_class;
		$action = $action_name;
		
		if ( !empty($_POST) )
			$request = $_POST;
		
		if(method_exists($controller, $action))
		{
			// action
			$controller->$action($request);
		}
		else
			Route::ErrorPage404();
    }
	
	static function getCurrentController()
	{
		$controller_name = 'main';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		return $controller_name;
	}
	
	static function getCurrentAction()
	{
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}
		
		return $action_name;
	}
	
	static function redirect($url)
	{
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		header('Location: '.$host.$url);
	}
    
    function ErrorPage404()
    {
		$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header('Status: 404 Not Found');
		
		include "app/controllers/404.php";
		$controller = new Controller_404;
		
		$controller->action_index();
		exit();
    }
}
?>