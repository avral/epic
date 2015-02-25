<?php 

/**
* Контроллер
*/

require_once 'core/view.class.php';
require_once 'core/model.class.php';
require_once 'core/route.class.php';

class controller
{

	static function start()
	{

		$route = new route;
		$url = $route->url;
		$get = $route->get;
		//var_dump($url);
		//var_dump($get);
		$model = new model;
		$model->url = $url;
		$model->get = $get;
		$data = $model->model();
		//var_dump($data);
		$view = new view;
		$view->data = $data;
		$view->render();

	}

}

?>