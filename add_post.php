<?php

header('Content-Type: text/html; charset=utf-8');

$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');

$postNum = $_POST['postNum'];
$title = $_POST['title'];
$post = $_POST['post'];
$img = '<img src="'.$_POST['img'].'">';

if (isset($postNum)) {
	$a = $DB->exec("UPDATE `bd`.`posts` SET `title` = '$title', `post` = '$post' WHERE `posts`.`id` = '$postNum'");
	header('Location: http://localhost/blog');
}
else {
	$a = $DB->exec("INSERT INTO `bd`.`posts` (`id`, `title`, `post`, `img`) VALUES (NULL, '$title', '$post', '$img')");
}


header('Location: http://localhost/blog');

?>
