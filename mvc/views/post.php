<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/mv/css/bootstrap.css" rel="stylesheet">
    <link href="/mv/css/bootstrap-responsive.css" rel="stylesheet">
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

          <?=$this->data['title']; ?>
        
        </h1>
        <em><a href="#" target="_blank"></a></em>
          <p style="font-size: 1.2em;">

            <?=$this->data['img'].'<br>'.$this->data['post'];   ?>
          
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
      <form action="add_post.php" method="POST">
      <input type="hidden" name="postNum" value="<?=$pageNum ?>">
        <input class="span8" type="text" name="title" value="<?=$this->data['title']; ?>"><br>
        <textarea name="post" rows="7" class="span12" ><?=$this->data['post']; ?></textarea><br>
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