<?php
session_start();
if ($_SESSION['status'] != 2)
{
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
//	echo '<a href="http://the11a.16mb.com/">Вот сюда.</a>';
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css">
<title>Список пользователей</title>
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
$ip = $_SERVER['REMOTE_ADDR'];
echo "<br>Ваш IP - $ip";

echo '<hr color="#red">';

printf("Панель администратора, специально для тебя, <b>%s</b>.", $_SESSION['name']);
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
<?php
include('connection.php');

$query = mysql_query("SELECT  * FROM `users` WHERE `status`='0'");

echo "<u>Пользователи группы \"Учащийся\":</u> <br>";
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<strong>ID=%d. %s %s - %s</strong><br>", $row['id'], $row['lastname'], $row['name'], $row['login']);
	echo '<form action="admin/chnguser.php" method="post">';
	printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
	echo '<input type="submit" name="chng" value="Просмотреть">';
	echo '</form>';
}
echo '<hr color="red">';

$query = mysql_query("SELECT  * FROM `users` WHERE `status`='1'");

echo "<u>Пользователи группы \"Учитель\":</u> <br>";
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<strong>ID=%d. %s %s - %s</strong><br>", $row['id'], $row['name'], $row['lastname'], $row['login']);
	echo '<form action="admin/chnguser.php" method="post">';
	printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
	echo '<input type="submit" name="chng" value="Просмотреть">';
	echo '</form>';
}
echo '<hr color="red">';

$query = mysql_query("SELECT  * FROM `users` WHERE `status`='2'");

echo "<u>Пользователи группы \"Администратор\", просто Величества:</u> <br>";
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<strong>ID=%d. %s %s - %s</strong><br>", $row['id'], $row['lastname'], $row['name'], $row['login']);
}
echo '<hr color="red">';

mysql_close();
 ?>

   </div>
   </div>

   
</body>
</html>