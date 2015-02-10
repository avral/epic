<?php

header('Content-Type: text/html; charset=utf-8');

$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');

//$title = $_POST['title'];
//$price = $_POST['post'];



$a = $DB -> prepare("INSERT INTO `bd`.`posts` (`id`, `title`, `post`) VALUES (NULL, 'sad', 'asd')");

$a -> execute();




//$b = $a -> fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST"><br>
		<input type="text" name="title">Название<br>
		<input type="text" name="post">Цена<br>
		<input type="submit" value="Отправить">
	</form>
</body>
</html>

<?php var_dump($a); ?>
