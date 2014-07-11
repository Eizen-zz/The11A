<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['id'] != 99)
{
	exit ('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p> <p align="center"> <a href="http://the11a.16mb.com/">Вот сюда.</a> </p>'); 
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css">
<title>Поддержка сайта: отвечаем</title>
</head>

<body background="/img/back.jpg">

<div id="container">
   <div id="header"> 
   </div>
   <table width="1130px" align="center" border="1px" frame="border">
	<tr>  
    <td><a href="/">Главная</a></td> 
    <td> <a href="http://hostinger.ru/" target="_blank">Hostinger.ru</a> </td> 
    <td> <a href="tasks.php">Задачи (цели)</a> </td>
    <td> <a href="/galery/">Галарея</a> </td> 
    <td> <a href="/chat/">Чат</a> </td> 
    <td> <a href="/support.php?act=ask">Поддержка</a> </td>
    </tr>
   </table>
   </div>
   
   
   <div id="content">
   <div id="sidebar">
<?php 
echo 'Поддержка сайта.';
?>
<hr color="red">
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
$act = ($_GET['act']);
if ($act=="ans")
{
	echo '<ul>';
    echo '<li><a href="support.php">Архив вопросов</a></li>';
	echo '<li><a href="http://the11a.16mb.com/">Вернуться</a></li>';
	echo '</ul>';
	echo '<p style="background:#CA181A; color: #FFF;" align="center">';
echo 'Вопросы без ответа: </p>';

include('connection.php');

$query = mysql_query("SELECT * FROM `support` WHERE `status`='0'");
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<p><b>ID вопроса: </b>%d</p>", $row['id']);
	printf("<p><b>Автор вопроса: </b>%s</p>", $row['author']);
	printf("<p><b>Тема вопроса: </b>%s</p>", $row['topic']);
	printf("<p><b>Вопрос: </b>%s</p><hr color=\"#CA181A\">", $row['subj']);
	echo '<form action="ansask.php" method="post">';
	printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
	echo '<input type="submit" name="chng" value="Ответить">';
	echo '</form><hr>';
}

 mysql_close();
}
else
include('supporta.php');
?>

	
   </div>
   <div id="footer">
     <p align="center"> <strong> <a href="index.php">Главная</a>  |  
     <a href="/study/">Учебный материал</a>   |    
  <a href="/teach/">От преподавателей</a>  |   
    <a href="nc.html">Галарея</a>  |    
     <a href="/chat/">Чат</a> <br>
&copy; <s>Раздолбаи</s> Трудящиеся 11А класса
</strong></p>
   </div>
   </div>

   
</body>
</html>