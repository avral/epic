<?php
echo 'asd';
header('Content-Type: text/html; charset=utf-8');

$posts = unserialize(file_get_contents('posts.php'));

if ($posts === false) {
	$posts = [];
}

$title = $_POST['title'];
$message = $_POST['message'];

$newPost = [
	'title' => $title,
	'message' => $message,
];

array_push($posts, $newPost);

file_put_contents('posts.php', serialize($posts));

header('Location: http://localhost/blog');

?>
