<?php
session_start();
if ($_SESSION['status'] != 2 && $_SESSION['id'] != 99)
{
	exit ('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p> <p align="center"> <a href="http://the11a.16mb.com/">Вот сюда.</a> </p>'); 
//	echo '<a href="http://the11a.16mb.com/">Вот сюда.</a>';
}
?>

<!DOCTYPE HTML>
<html>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Поддержка: отвечаем</title>
</head>

<body>

<ul>
  <li><a href="support.php?act=ans">Вопросы без ответа</a></li>
  <li><a href="http://the11a.16mb.com/">Вернуться</a></li>
    
</ul>

<?php 
echo '<p style="background:#CA181A; color: #FFF;" align="center">';
echo 'Архив вопросов: </p>';

include('connection.php');

$query = mysql_query("SELECT * FROM `support` WHERE `status`='1' ORDER BY `id` DESC");
while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
	printf("<p><b>ID вопроса: </b>%d</p>", $row['id']);
	printf("<p><b>Автор вопроса: </b>%s</p>", $row['author']);
	printf("<p><b>Тема вопроса: </b>%s</p>", $row['topic']);
	printf("<p><b>Вопрос: </b>%s</p>", $row['subj']);
	printf("<p><b>Ответ: </b>%s</p><hr color=\"#CA181A\">", $row['answer']);
	echo '<form action="delask.php" method="post">';
	printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
	echo '<input type="submit" name="del" value="Удалить">';
	echo '</form><hr>';
}

 mysql_close();
 ?>
 </body>
</html>