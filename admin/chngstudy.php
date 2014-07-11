<? session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
if (!isset($_POST['id']))
exit('<p style="background:#000; color: #FFF;" align="center">Не выбрана новость для редактирования.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include('style.php'); ?>
		<script src="/js/but.js"></script>
		<script src="/js/jquery.js"></script>
		<title>Изменение материала</title>
	<head>

	<body>

		<div id="container">
		<div id="header"></div>
		<?
			$std = date("G");
			if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
				include('table.php');
			else 
				include('tablen.php');
		?>
		</div>
   
   
		<div id="content">
		<div id="sidebar">
			Изменение материала
		</div>
		<div id="main">
		<?
			if (isset($_POST['id']) && isset($_POST['chng'])) {
				$id = $_POST['id'];
				include('connection.php');
				$query = mysql_query("SELECT * FROM `study` WHERE `id`='$id'");
				$row = mysql_fetch_array($query, MYSQL_ASSOC);
				echo '<form action="chngstudy.php?act=change" method="post">'; 
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					printf("<p>Тема:</p><input type=\"text\" name=\"title\" size=\"50\" value=\"%s\">", $row['title']);
					printf("<p>Материал:</p><textarea name=\"text\" cols=\"50\" rows=\"10\">%s</textarea>", $row['text']);
					printf("<p>Ссылка на файл:</p><input type=\"text\" name=\"afile\" size=\"50\" value=\"%s\">", $row['afile']);
					printf("<p><input type=\"submit\" name=\"chng\" value=\"Изменить\">");
					printf("<input type=\"reset\" value=\"Очистить\"></p>");
				echo '</form>';
				mysql_close();
			}
			$act = $_GET['act'];
			if ($act == 'change' && isset($_POST['chng'])) {
				$id = $_POST['id'];
				$title = $_POST['title'];
				$text = $_POST['text'];
				$afile = $_POST['afile'];
				include('connection.php');
				$query = mysql_query("UPDATE `study` SET `title`='$title', `text`='$text', `afile`='$afile' WHERE `id`='$id'");
				mysql_close();
				header('Location: http://the11a.16mb.com/study/');
			}
		?>  
	
   </div>
   </div>

   
</body>
</html>