<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
  exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
    <title>Добавление объявления</title>
  <head>

  <body>

    <div id="container">
      <div id="header"></div>
      <? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
    </div>
   
    <div id="content">
      <div id="sidebar">
        Добавление объявления
        <? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
      </div>
      <div id="main">
        <form action="?act=add" method="post"> 
          <input type="hidden" name ="name" value="<? $s = $_SESSION['name'].' '.$_SESSION['fname']; echo $s; ?>">
          <p> Заголовок:</p><input type="text" name="title" size="50">
          <p> Новость:</p><textarea name="text" cols="50" rows="10"></textarea>
          <p>Ссылка на файл:</p><input type="text" name="afile" size="50">
          <p><input type="submit" name="add" value="Добавить">
          <input type="reset" value="Очистить"></p>
        </form>
        <?
          $act = $_GET['act'];
          if ($act == 'add' && isset($_POST['add'])) {
            $title = $_POST['title'];
            $text = nl2br($_POST['text']);
            $afile = $_POST['afile'];
            $name = $_POST['name'];
            include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
            $query = mysql_query("INSERT INTO `teach` (`title`, `text`, `afile`, `name`) VALUES ('$title', '$text', '$afile', '$name')");
            mysql_close();
            echo '<script>window.location = "/teach/"</script>';
          }
          
          if ($act == 'delete' && isset($_POST['del'])) {
            $id = $_POST['id'];
            include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
            $query = mysql_query("DELETE FROM `teach` WHERE `id`='$id'");
            mysql_close();
            echo '<script>window.location = "/teach/"</script>';
          }
      ?>
      </div>
    </div>
  </body>
</html>