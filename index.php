<?php header('Content-Type: text/html; charset=utf-8');

if (isset($_GET['post'])) {
  require 'post.php';
}
else {
  require 'indexpage.php';
}

?>
