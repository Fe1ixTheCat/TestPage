<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet/less" type="text/css" href="styles.less" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/3.9.0/less.min.js" ></script>
  </head>
  <body>
    <div class="container">
      <header>
        <h1>Logo</h1>
        <ul>
          <li><a href="#">Войти</a></li>
          <li><a href="#" onclick="open()">Опубликовать</a></li>
        </ul>
      </header>
      <main>
        <?php
          $timeNow = time();
          $host = 'localhost';
          $user = 'root';
          $pass = '';
          $db_name = 'mybase';
          $link = mysqli_connect($host, $user, $pass, $db_name);

          if (!$link) {
            echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
            exit;
          }

          $limit = 5;
          $offset = isset($_GET['page']) ? $_GET['page'] : 1;
          $page = $limit * ($offset - 1);
          $request = 'SELECT * FROM `news` LIMIT '.$limit.' OFFSET '.($page);
          $sql = mysqli_query($link, $request);


          while ($result = mysqli_fetch_array($sql)) {
            $timestamp = $result['time'];
            $date = date('G:i  d.m.Y', $timestamp);
            $id = $result['id'];
            echo "<div class='post-item'>
                    <div class='image'>
                      <img src='{$result['image']}' alt='image'>
                    </div>
                    <div class='post-info'>
                      <h2>{$result['heading']}</h2>
                      <p>{$date}</p>
                      <h3 onclick='text(this)' id='{$id}'>Читать подробнее</h3>
                      <p class='full {$id}'>{$result['about']}</p>
                      <span>Удалить</span>
                    </div>
                  </div>";
          };

        ?>
        <nav>
          <a href="?page=1">1</a>
          <a href="?page=2">2</a>
          <a href="?page=3">3</a>
          <a href="?page=4">4</a>
        </nav>
      </main>
      <footer>

      </footer>

    </div>
    <div class="public" id="public">

      <form class="" action="#" method="post">
        <label for="heading">Введите название статьи:</label><br>
        <input type="text" name="heading" value=""><br>
        <label for="about">Введите текст статьи:</label><br>
        <textarea name="about"></textarea><br>
        <label for="image">Загрузите картинку</label>
        <input type="file" name="image" value=""><br>
        <button type="submit" name="button">Загрузить</button>
        <button type="button" name="button" onclick="close()">Закрыть</button>
      </form>
    </div>
    <script src="script.js"></script>
  </body>
</html>
