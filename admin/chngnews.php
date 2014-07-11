<? session_start();
if ($_SESSION['status'] != 2)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
if (!isset($_POST['id']))
exit('<p style="background:#000; color: #FFF;" align="center">Не выбрана новость для редактирования.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Изменение новости</title>
	<head>

	<body>

		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
   
		<div id="content">
		<div id="sidebar">
			Изменение новости
			<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
		</div>
		<div id="main">
		<?
			if (isset($_POST['id']) && isset($_POST['chng'])) {
				$id = $_POST['id'];
				include('connection.php');
				$query = mysql_query("SELECT * FROM `news` WHERE `id`='$id'");
				$row = mysql_fetch_array($query, MYSQL_ASSOC);
				$desc = str_replace(array("<br>", "<br />"), "", $row['desc']);
				$text = str_replace(array("<br>", "<br />"), "", $row['text']);
				echo '<form action="?act=change" method="post">'; 
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					printf("<p>Заголовок:</p><input type=\"text\" name=\"title\" size=\"50\" value=\"%s\">", $row['title']);
					printf("<p>Описание:</p><textarea name=\"desc\" cols=\"40\" rows=\"5\">%s</textarea>", $desc);
					printf("<p>Новость:</p><textarea name=\"text\" cols=\"50\" rows=\"10\">%s</textarea>", $text);
					printf("<p><input type=\"submit\" name=\"chng\" value=\"Изменить\">");
					printf("<input type=\"reset\" value=\"Очистить\"></p>");
				echo '</form>';
				mysql_close();
			}
			$act = $_GET['act'];
			if ($act == 'change' && isset($_POST['chng'])) {
				$id = $_POST['id'];
				$title = $_POST['title'];
				$desc = nl2br($_POST['desc']);
				$text = nl2br($_POST['text']);
				include('connection.php');
				$query = mysql_query("UPDATE `news` SET `title`='$title', `text`='$text', `desc`='$desc' WHERE `id`='$id'");
				mysql_close();
				echo '<script>window.location = "/"</script>';
			}
		?>  
	
		</div>
		</div>
	</body>
</html>