<?php
<<<<<<< HEAD
=======
header('Content-Type: text/html; charset=utf-8');
>>>>>>> b3e3563a73d014a778aefb0b2ab628d343171c77

header('Content-Type: text/html; charset=utf-8');

$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');

$title = $_POST['title'];
$post = $_POST['post'];

$a = $DB->exec("INSERT INTO `bd`.`posts` (`id`, `title`, `post`) VALUES (NULL, '$title', '$post')");


header('Location: http://localhost/blog');

?>
