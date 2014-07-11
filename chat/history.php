<?php
session_start();
if ($_SESSION['online'] != 1)
exit('<p style="background:#000; color: #FFF;" align="center">Извините, но чат только для авторизованных пользователей. Авторизацию пройдите по следующей ссылке.</p><p align="center"><a href="http://the11a.16mb.com/login.php">Тут.</a></p>');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>История сообщений</title>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<script type="text/javascript" src="jquery.js"></script>
</head>
<body background="/img/backch.jpg">
<div class="chat r4">

<div id="chat_area">
<?
include('connect.php');
$query = mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC");
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<b><u>%s</u></b> <br>", $row['name']);
	printf("<tt>%s</tt><br>", $row['text']);
	printf("<i><%s></i><br><br>", $row['date']);
}
mysql_close();
?>
</div>
</div>
</body>
</html>