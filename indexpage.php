<?php header('Content-Type: text/html; charset=utf-8');
//Сообщения базы
$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');
$a = $DB->query("SELECT * FROM `posts`", PDO::FETCH_ASSOC);
$posts = $a->fetchALL(PDO::FETCH_ASSOC);

session_start();

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="bootstrap-responsive.css" rel="stylesheet">
    <style>
      .post {
         background-color: #D3D3D3;
         border-radius: 10px;
         padding: 10px 10px;
         margin-bottom: 10px; 
      }
    </style>
  </head>

  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>     
          </a>
          <a class="brand" href="http://localhost/blog/">

            <?php if ($_SESSION['auth'] == 1) { echo 'Админ'; } else { echo 'Гость'; }?>

          </a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="http://localhost/blog/">Главная</a></li>
              <li><a href="login.php">Логин</a></li>
            </ul>
          </div> 
        </div>
      </div>
    </div>
    <div class="container">

  <?php foreach ($posts as $key => $value){ ?>

      <div class="post">
        <h1>

         <?=$value['title']; ?>

        </h1>                     
          <em><a href="#" target="_blank"></a></em>
          <p style="font-size: 1.2em;">

            <?=$value['post']; ?> 

              <a class="btn btn-success pull-right" href="?post=<?=$posts[$key]['id']; ?>">Подробнее</a>
          </p> 
      </div>  

  <?php } ?>

    <hr>

  <?php if ($_SESSION['auth'] == 1){ ?>

    <h4>Добавить новый пост</h4> 
      <form action="add_post.php?edit=add" method="POST">
        <input class="span8" placeholder="Заголовок" type="text" name="title">
        <input style="margin-left: 15px;" class="span4" type="text" placeholder="Ссылка на фоторгафию" name="img">
        <br>
        <textarea placeholder="Введите текст" name="post" rows="7" class="span12" ></textarea><br>
      <button type="submit" class="btn btn-success" style="margin-bottom: 10px;">Отправить</button>
      </form>

  <?php } ?>

    </div>
    <hr>
    <footer>

    </footer>
  </body>
</html