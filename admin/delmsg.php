<?php
session_start();
if ($_SESSION['status'] != 2)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
//	echo '<a href="http://the11a.16mb.com/">Вот сюда.</a>';
$id = $_POST['id'];

include('connection.php');

if (isset($_POST['del']))
$query = mysql_query("DELETE FROM `messages` WHERE `id`='$id'");

mysql_close();
header('Location: http://the11a.16mb.com/admin/chatmod.php');
?>