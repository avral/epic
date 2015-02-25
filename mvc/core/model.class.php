<?php 
/**
* Работа с базой
*/
class model
{

	public $url;
	public $get;

	function model()
	{
		$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');

		if ($this->url == NULL) {
				$a = $DB->query("SELECT * FROM `posts`");
				$data = $a->fetchAll(PDO::FETCH_ASSOC);
				$data[0]['cat'] = 'allposts';
					return $data;
		}
		if ($this->url == 'post') {
			if (!empty($this->get['id'])) {
				$id = $this->get['id'];  //Тут должна быть фильтрация
				$a = $DB->query("SELECT * FROM `posts` WHERE `posts`.`id` = '$id'");
				$data = $a->fetch(PDO::FETCH_ASSOC);
				$data[0]['cat'] = 'selectpost';
					return $data;
			}
		}
		
	}
}


?> 