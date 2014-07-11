<?php
session_start();
if ($_SESSION['status'] != 2)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
    <title>Добавление альбома</title>
    <script src="/js/main.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="header"></div>
      <?
        $std = date("G");
        if ($std >= 12 && $std < 22) // с 7.00 до 20.59
          include($_SERVER['DOCUMENT_ROOT'] . '/tablen.php'); //ночной дизайн
        else 
          include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); //дневной дизайн
      ?>
    </div>
  
    <div id="content">
      <div id="sidebar">
        <?
          $ip = $_SERVER['REMOTE_ADDR'];
          echo "<br>Ваш IP - $ip<br>";
        ?>
        <ul type="square">
        <li><a href="index.php">Основная</a></li>
        <li><a href="users.php">Список пользователей</a></li>
        <li><a href="addnews.php">Добавить новость</a></li>
        <li><a href="addstudy.php">Добавить материал</a></li>
        <li><a href="addfile.php">Загрузить файл</a></li>
        <li><a href="galertmod.php">Модерация галереи</a></li>
        <li><a href="chatmod.php">Модерация чата</a></li>
        </ul>
      </div>
      <div id="main">
        <?
          $act = $_GET['act'];
          if ($act == "create" && isset($_POST['add'])) {
            $class = $_POST['class'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
            $isthere = false;
            $same = false;
            $query = mysql_query("SELECT * FROM `albums`");
            while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
              if ($title == $row['title'])
                $isthere = true;
              else {
                $st1 = $row['title'];
                $st2 = $title;
                for ($i = 0; $i < strlen($st1); $i++) {
                  if (ord($st1[$i]) >= 65 && ord($st1[$i]) <= 90)
                    $st1[$i] = chr(ord($st1[$i]) + 32);
                }
                for ($i=0; $i<strlen($st2); $i++) {
                if (ord($st2[$i]) >= 65 && ord($st2[$i]) <= 90)
                  $st2[$i] = chr(ord($st2[$i]) + 32);
                }
                if ($st1 == $st2) {
                  $same = true;
                  $title = $row['title'];
                }
              }
            }
            if ($isthere == false && $same == false)
              $query = mysql_query("INSERT INTO `albums` (`class`, `title`, `desc`) VALUES ('$class', '$title', '$desc')");
            mysql_close();
            echo '<script>window.location = "/admin/editalbum.php?album=' . $title . '"</script>';
          }
        ?>
      	<form action="?act=create" method="post" class="add_album">
        	<fieldset>
            <legend>Добавление альбома</legend>
            <p>Класс:</p>
            <input type="text" name="class" id="class">
            <p>Название альбома:</p>
            <input type="text" name="title" id="title"><br>
          	Если хочется добавить фотографий в уже существующий альбом, в качестве названия альбома введи имя альбома, в который добавляешь фото.
            Список альбомов ниже в спойлере.<br>
            <a id="tool_a" onclick="showTooltip('tooltip');"><b>Cписок</b></a>
            <div id="tooltip" style='display: none;'>
            <?
              include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
              $query = mysql_query("SELECT * FROM `albums`");
              while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
                echo $row['title'].'<br>';
              mysql_close();
            ?>
            </div>	
          	<p>Краткое описание альбома:</p>
            <textarea name="desc"></textarea><br>
          	<input type="submit" name="add" value="Добавить">
          </fieldset>
      	</form>
      </div>
    </div>
  </body>
</html>