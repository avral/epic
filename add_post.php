<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');

$edit = $_GET['edit'];

$postNum = $_POST['postNum'];
$title = $_POST['title'];
$post = $_POST['post'];
$img = '<img src="'.$_POST['img'].'">';

switch ($edit) {
	case 'delete':
		if ($_SESSION['auth'] == 1) {
			$DB->query("DELETE FROM `bd`.`posts` WHERE `posts`.`id` = '$pageNum'");
  			header('Location: http://localhost/blog/');
		}
		else {
			echo 'Недостаточно прав!';
		}
		break;
	case 'edit':
		if ($_SESSION['auth'] == 1) {
			$DB->exec("UPDATE `bd`.`posts` SET `title` = '$title', `post` = '$post' WHERE `posts`.`id` = '$postNum'");
			header('Location: http://localhost/blog');
		}
		else {
			echo 'Недостаточно прав!';
		}
		break;
	case 'add':
			if ($_SESSION['auth'] == 1) {
				$DB->exec("INSERT INTO `bd`.`posts` (`id`, `title`, `post`, `img`) VALUES (NULL, '$title', '$post', '$img')");
				header('Location: http://localhost/blog/');
			}
			else {
				echo 'Недостаточно прав';
			}
			break;
	default:
		echo 'Неверный запрос';
		break;
}

?>
