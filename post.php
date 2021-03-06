<?php header('Content-Type: text/html; charset=utf-8');
session_start();
$pageNum = $_GET['post'];

$DB = new PDO("mysql:host=localhost;dbname=bd;charset=UTF8", 'root', '');
$a = $DB->query("SELECT * FROM `posts` WHERE `id` = '$pageNum'", PDO::FETCH_ASSOC);
$posts = $a->fetchALL(PDO::FETCH_ASSOC);

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
      <div class="post">
        <h1>

          <?=$posts[0]['title']; ?>
        
        </h1>
        <em><a href="#" target="_blank"></a></em>
          <p style="font-size: 1.2em;">

            <?=$posts[0]['img'].'<br>'.$posts[0]['post'];   ?>
          
          </p>
      </div>
      <div class="editpage">
      
        <?php if ($_SESSION['auth'] == 1){ ?>

          <a href="?post=<?=$pageNum ?>&edit=delete" class="btn btn-danger pull-right"?>Удалить статью</a>
          <a href="?post=<?=$pageNum ?>&edit=edit" class="btn btn-primary pull-right" style="margin-right: 20px;"?>Редактировать</a>

        <?php } ?>

      </div>

        <?php if ($edit === 'edit'){ ?>
<br><hr>
      <h4>Редактировать</h4>
      <form action="add_post.php?edit=edit" method="POST">
      <input type="hidden" name="postNum" value="<?=$pageNum ?>">
        <input class="span8" type="text" name="title" value="<?=$posts[0]['title']; ?>"><br>
        <textarea name="post" rows="7" class="span12" ><?=$posts[0]['post']; ?></textarea><br>
      <button type="submit" class="btn btn-success" style="margin-bottom: 10px;">Отправить</button>
      </form>

        <?php } ?>

      </div>
    </div>
    <hr>
    <footer>
        
    </footer>
  </body>
</html>