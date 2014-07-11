<?php
session_start();
if ($_SESSION['online'] != 1)
exit('Менять профиль могут только авторизованные пользователи. <a href="http://the11a.16mb.com/">Вернуться</a>');

$id = $_GET['id'];
$new_pass = $_GET['pass'];
$new_pass_con = $_GET['passcon'];

if ($_SESSION['id'] != $id)
die ('Нельзя менять данные другого пользователя! По крайней мере, Вам! <a href="chngprof.php">Вернуться</a>'); //анти-хак

include('connect.php');

if (isset($new_pass) && isset($new_pass_con)) //смена пароля
{
if (strlen($new_pass)>16 || strlen($new_pass)==0 || $new_pass_con != $new_pass)
die('Введенные вами данные некорректны. Попробуйте еще раз. <a href="chngprof.php">Вернуться</a>');
if (isset($_GET['chng']))
$query = mysql_query("UPDATE `users` SET `pass`='$new_pass' WHERE `id`='$id'");
}

mysql_close();
header('Location: http://the11a.16mb.com/chngprof.php');
?>