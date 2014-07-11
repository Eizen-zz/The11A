<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
{
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
//	echo '<a href="http://the11a.16mb.com/">Вот сюда.</a>';
}
if (!isset($_POST['id']))
exit('<p style="background:#000; color: #FFF;" align="center">Не выбрана новость для редактирования.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>');
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<? include('style.php'); ?>
<script src="
<?
$std = date("G");

$day = "/js/buttons.js";
$night = "/js/buttonsn.js";

if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
echo $day;
else 
echo $night;
?>
"></script>
<title>Изменение новости (учитель)</title>
</head>

<body>

<div id="container">
   <div id="header"> 
   </div>
<?
$std = date("G");
if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
include('table.php');
else 
include('tablen.php');
?>
   </div>
   
   
   <div id="content">
   <div id="sidebar">
<?php 
echo '<b>Изменение материала</b>';
?>
   </div>
   <div id="main">
<?php
	$id = $_POST['id'];
	include('connection.php');

if (isset($_POST['chng']))
$query = mysql_query("SELECT * FROM `teach` WHERE `id`='$id'");
$row = mysql_fetch_array($query, MYSQL_ASSOC);
	echo '<form action="tnewchng.php" method="post">'; 
 printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
 printf("<p>Тема:</p><input type=\"text\" name=\"title\" size=\"50\" value=\"%s\">", $row['title']);
 printf("<p>Материал:</p><textarea name=\"text\" cols=\"50\" rows=\"10\">%s</textarea>", $row['text']);
  printf("<p>Ссылка на файл:</p><input type=\"text\" name=\"afile\" size=\"50\" value=\"%s\">", $row['afile']);
  printf("<p><input type=\"submit\" name=\"chng\" value=\"Изменить\">");
   printf("<input type=\"reset\" value=\"Очистить\"></p>");
  echo '</form>';
mysql_close();
?>  

   </div>
   </div>

   
</body>
</html>