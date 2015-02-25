<?php 

/**
* Отображение
*/
class view
{
	public $data;
	function render()
	{

		switch ($this->data[0]['cat']) {
			case 'allposts':
				include 'views/template.php';
				break;
			case 'selectpost':
				include 'views/post.php';
				break;
			default:
				echo '404 Не существует';
				break;
				
		}
	}
}

?>