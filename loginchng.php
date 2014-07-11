<?php
session_start();
if ($_SESSION['online'] != 1)
exit('Менять профиль могут только авторизованные пользователи. <a href="http://the11a.16mb.com/">Вернуться</a>');

$id = $_GET['id'];
$new_login = $_GET['login'];
$new_login = htmlspecialchars($new_login);
$new_login = mysql_escape_string($new_login);

if ($_SESSION['id'] != $id)
die ('Нельзя менять данные другого пользователя! По крайней мере, Вам! <a href="chngprof.php">Вернуться</a>'); //анти-хак

include('connect.php');

if (isset($new_login)) //если меняется логин, то выполняется этот кусок
{
$query = mysql_query("SELECT * FROM `users`");

$row = mysql_fetch_array($query, MYSQL_ASSOC);
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	$st1 = $row['login'];
	$st2 = $new_login;
	$id1 = $row['id'];
	$id2 = $_SESSION['id'];
	for ($i=0; $i<strlen($st1);$i++)
{
	if (ord($st1[$i])>=65 && ord($st1[$i])<=90)
	$st1[$i] = chr(ord($st1[$i])+32);
}
	for ($i=0; $i<strlen($st2);$i++)
{
	if (ord($st2[$i])>=65 && ord($st2[$i])<=90)
	$st2[$i] = chr(ord($st2[$i])+32);
}
	if ($st1==$st2 && $id1 != $id2)
	die('Этот логин уже занят. Введите другой. <a href="chngprof.php">Вернуться</a>');
}

if (strlen($new_login)>16 || strlen($new_login)==0)
{
	die('Введенные вами данные некорректны. Попробуйте еще раз. <a href="chngprof.php">Вернуться</a>');
}

if (isset($_GET['chng']))
$query = mysql_query("UPDATE `users` SET `login`='$new_login' WHERE `id`='$id'");

}

mysql_close();
header('Location: http://the11a.16mb.com/chngprof.php');
?>