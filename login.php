<?php 
session_start();
if ($_POST['login'] == 'admin' && $_POST['pass'] == '1234'){
	$_SESSION['auth'] = 1;
}

if (isset($_GET['logout'])){
	unset($_SESSION['auth']);
	header('Location: http://localhost/blog/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Логин</title>
	 <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <style>
		.loginform {
			margin-left: 25px;
		}
    </style>
</head>
<body
	<div class="navbar navbar-inverse">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="btn btn-navbar" data-toggle="collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </a>
	      <a class="brand" href="http://localhost/blog/">

	      <?php if ($_SESSION['auth'] == 1) { echo 'Админ'; } else { echo 'Гость'; }?>

	      </a>
	      <div class="nav-collapse collapse">
	        <ul class="nav">
	          <li><a href="http://localhost/blog/">Главная</a></li>
	          <li class="active"><a href="login.php">Логин</a></li>
	        </ul>
	      </div> 
	    </div>
	  </div>
	</div>
	<div class="loginform">

	<?php if ($_SESSION['auth'] !== 1){ ?>
		
		<h3>Войдите в аккаунт</h3>
		<form class="offset" action="" method="POST">
			<input type="text" name="login" placeholder="Логин"><br>
			<input type="text" name="pass" placeholder="Пароль"><br>
			<button type="submit" class="btn btn-success">Отправить</button>
		</form>

	<?php } ?>

	<?php if ($_SESSION['auth'] == 1){ ?>
		
		<h3>Вы авторизованы</h3>
		<a href="?logout"><button class="btn btn-danger">Выйти</button></a>

	<?php } ?>

	</div>
</body>
</html>
