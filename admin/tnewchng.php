<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
//	echo '<a href="http://the11a.16mb.com/">Вот сюда.</a>';

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$afile = $_POST['afile'];

include('connection.php');

if (isset($_POST['chng']))
$query = mysql_query("UPDATE `teach` SET `title`='$title', `text`='$text', `afile`='$afile' WHERE `id`='$id'");

mysql_close();
header('Location: http://the11a.16mb.com/teach/');
?>