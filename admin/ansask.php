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
<head>
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Поддержка: отвечаем</title>
</head>

<body>
<?php
$id = $_POST['id'];

include('connection.php');

$query = mysql_query("SELECT * FROM `support` WHERE `id`='$id'");
$row = mysql_fetch_array($query, MYSQL_ASSOC);

	printf("<p><b>ID вопроса: </b>%d</p>", $row['id']);
	printf("<p><b>Автор вопроса: </b>%s</p>", $row['author']);
	printf("<p><b>Тема вопроса: </b>%s</p>", $row['topic']);
	printf("<p><b>Вопрос: </b>%s</p><hr color=\"#CA181A\">", $row['subj']);
mysql_close();
?>

<form action="ans.php" method="post"> 
 <? printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $id); ?>
 <p>  Ответ:</p><textarea name="answer" cols="50" rows="10"></textarea>
   </textarea>
  <p><input type="submit" name="ans" value="Ответить">
   <input type="reset" value="Очистить"></p>
  </form> 


</body>
</html>