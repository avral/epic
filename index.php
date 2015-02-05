<?php header('Content-Type: text/html; charset=utf-8');
$posts = unserialize(file_get_contents('posts.php'));

if (isset($_GET['post'])) {
  require 'post.php';
}
else {
  require 'indexpage.php';
}

?>