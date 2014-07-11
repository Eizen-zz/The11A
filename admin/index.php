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
    <title>Панель администратора</title>
  </head>

  <body>
      <div id="container">
        <div id="header"></div>
        <? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
      </div>
      <div id="content">
        <div id="sidebar">
          <span>Администрирование</span>
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
          if ($act == cleanpoll && isset($_POST['clean'])) {
            include('connection.php');
           $query = mysql_query("UPDATE `users` SET `poll`='0'");
           mysql_close();
           Header('Location: http://the11a.16mb.com/admin/');
         }
          elseif ($act == cleanscore && isset($_POST['clean'])) {
            include('connection.php');
            $query = mysql_query("UPDATE `users` SET `score`='0'");
            mysql_close();
            Header('Location: http://the11a.16mb.com/admin/');
          }
          elseif ($act == cleandone && isset($_POST['clean'])) {
            include('connection.php');
            $query = mysql_query("UPDATE `users` SET `done`='0'");
            mysql_close();
            Header('Location: http://the11a.16mb.com/admin/');
          }
        ?>
        <b>Cсылки,не показанные в боковом меню:</b><br>
        <ul type="square">
          <li><a href="addht.php">Добавить д/з</a><br>
          <li><a href="addtnew.php">Добавить учительский материал</a><br>
          <li><a href="/req.txt" target="_blank">Просмотреть логи</a>
        </ul><hr>
        <form action="?act=cleanpoll" method="post">
          При нажатии удалится метка голосования у всех пользователей.<br>
          <input type="submit" name="clean" value="Удалить метку опросов">
        </form>
        <hr>
        <form action="?act=cleanscore" method="post">
          При нажатии удалится результат online-теста у всех пользователей.<br>
          <input type="submit" name="clean" value="Обнулить результаты">
        </form>
        <hr>
        <form action="?act=cleandone" method="post">
          При нажатии удалится метка прохождения online-теста у всех пользователей.<br>
          <input type="submit" name="clean" value="Удалить метку теста">
        </form>
  
      </div>
      <? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
    </div> 
  </body>
</html>