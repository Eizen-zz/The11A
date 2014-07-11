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
<title>Модерация чата</title>
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

echo '<hr color="#C8520B">';

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
  <form action="delchat.php" method="post">
  <input type="submit" name="del" value="Почистить чат!">
  </form>
  <hr color="red">
  <?
  include('connection.php');

$page = intval($_GET['page']); // значение текущей страницы из GET
$num = 30; // Переменная хранит число сообщений выводимых на станице
if ($page==0) $page=1;
// Определяем общее число сообщений в базе данных
$query = "SELECT COUNT(*) FROM `messages`";
$mysql_result = mysql_query($query);
 
if(mysql_num_rows($mysql_result)>0){
	$count=mysql_fetch_row($mysql_result);
	}
$posts = $count[0]; // получем значение кол-во всех записей
// Находим общее число страниц
$total = intval(($posts - 1) / $num) + 1;
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
 
// Проверяем нужны ли стрелки назад
if ($page != 1) $pervpage = '<a href="http://the11a.16mb.com/chatmod.php?page=1">В начало |</a>
<a href="http://the11a.16mb.com/chatmod.php?page='. ($page - 1).'">Назад |</a> ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = '  <a href="http://the11a.16mb.com/chatmod.php?page='. ($page + 1).'">| Вперед</a>
<a href="/chatmod.php?page='.$total.'"> | В конец</a> ';
// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = ' <a href="http://the11a.16mb.com/chatmod.php?page='. ($page - 2) .'">'. ($page - 2) .'</a>  ';
if($page - 1 > 0) $page1left = '<a href="http://the11a.16mb.com/chatmod.php?page='. ($page - 1) .'">'. ($page - 1) .'</a>  ';
if($page + 2 <= $total) $page2right = '  <a href="http://the11a.16mb.com/chatmod.php?page='. ($page + 2).'">'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = '  <a href="http://the11a.16mb.com/chatmod.php?page='. ($page + 1).'">'. ($page + 1) .'</a>';

$result = mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC LIMIT $start, $num");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	printf("<b><u>%s</u></b> <br>", $row['name']);
	printf("<tt>%s</tt><br>", $row['text']);
	printf("<i><%s></i><br>", $row['date']);
	echo '<form action="delmsg.php" method="post">';
	printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
	echo '<input type="submit" name="del" value="Удалить">';
	echo '</form>';
	echo '<hr color="red">';
}
if ($total>1) echo '<p><big>'
.$pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right
.$nextpage.'</big></p>';

mysql_close();
?> 

   </div>
   </div>

   
   
</body>
</html>