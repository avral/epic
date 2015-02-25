<?php 

/**
* Роутер
*/

class route
{
	public $url;
	public $get;
	function route()
	{
		
		$this->url = $_GET['route'];
		$this->get = 
		[
			'id' => $_GET['id'],
			'edit' => $_GET['edit'],
		];

	}

}



?>