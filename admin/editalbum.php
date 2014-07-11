<?php session_start();
if ($_SESSION['status'] != 2)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
    <title>Редактирование альбома</title>
  <head>

  <body>
    <div id="container">
      <div id="header"></div>
      <? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
    </div>
   
   
    <div id="content">
      <div id="sidebar">
        Добавление новости
        <? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
      </div>
      <div id="main">
        <?
          $a = $_GET['album'];
          echo $a . '<br>';
          echo 'Загрузка файлов является массовой. Что-бы загрузить один файл, нажми на кнопку ниже. Затем выбери файл и два щелчка по нему.';
          echo '<br>Чтобы загрузить несколько файлов, нужно зажать Ctrl и щелкать мышкой по файлам, которые хочешь загрузить. Все файлы загружаются в директорию upload/photo.';
          echo "<form action=\"?act=upload\" enctype=\"multipart/form-data\" method=\"post\">";
          echo "<input type=\"file\" min=\"1\" max=\"9999\" name=\"file[]\" multiple=\"true\" value=\"Выбери нужные файлы\" /> <br>";
          printf("<input type=\"hidden\" name=\"title\" value=\"%s\">", $title);
          echo "<input type=\"submit\" name=\"submit\" value=\"Загрузить\" /></form>";

          $act = $_GET['act'];
          if ($act == 'upload' && isset($POST['submit'])) {
            include('connection.php');
            foreach($_FILES['file']['name'] as $k=>$f) {
              if (!$_FILES['file']['error'][$k]) {
                if (is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
                  if (move_uploaded_file($_FILES['file']['tmp_name'][$k], "/home/u440081817/public_html/upload/photo/".$_FILES['file']['name'][$k])) {
                    $src = '/upload/photo/'.$_FILES['file']['name'][$k];
                    $album = $_POST['title'];
                    $query = mysql_query("INSERT INTO `photos` (`src`, `album`) VALUES ('$src', '$album')");
                    echo 'Файл: '.$_FILES['file']['name'][$k].' загружен.<br />';
                    echo '<br><a href="http://the11a.16mb.com/admin/">Вернуться</a>';
                  }
                }
              }
            }
          }     
        ?>
      </div>
    </div>
  </body>
</html>