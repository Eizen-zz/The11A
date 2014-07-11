<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="description" content="Домашнее задание 11 А класса.">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Домашнее задание</title>
	</head>
	<body>
		<div id="container">
		<div id="header"></div>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Дежурство</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<?
					if (isset($_SESSION['htask_action'])) {
						printf ("<a href=%s><big><p align=center style=margin:0;>Вернуться обратно.<p></big></a>", $_SERVER['HTTP_REFERER']);
						unset($_SESSION['htask_action']);
					}
					include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
					$query = mysql_query("SELECT * FROM `hometask`");
					$row = mysql_fetch_array($query, MYSQL_ASSOC);
					echo '<big><b><u>Понедельник</u></b></big><br>';
					printf("<b>Биология: </b>%s<br>", $row['1.1']);
					printf("<b>Физкультура: </b>%s<br>", $row['1.2']);
					printf("<b>Алгебра: </b>%s<br>", $row['1.3']);
					printf("<b>Алгебра: </b>%s<br>", $row['1.4']);
					printf("<b>Английский язык: </b>%s<br>", $row['1.5']);
					printf("<b>История: </b>%s<br>", $row['1.6']);
					echo '<br><big><b><u>Вторник</u></b></big><br>';
					printf("<b>Геометрия: </b>%s<br>", $row['2.1']);
					printf("<b>Геометрия: </b>%s<br>", $row['2.2']);
					printf("<b>Литература: </b>%s<br>", $row['2.3']);
					printf("<b>Физкультура: </b>%s<br>", $row['2.4']);
					printf("<b>Литература: </b>%s<br>", $row['2.5']);
					printf("<b>Английский язык: </b>%s<br>", $row['2.6']);
					echo '<br><big><b><u>Среда</u></b></big><br>';
					printf("<b>Алгебра: </b>%s<br>", $row['3.1']);
					printf("<b>Алгебра: </b>%s<br>", $row['3.2']);
					printf("<b>Физика: </b>%s<br>", $row['3.3']);
					printf("<b>История: </b>%s<br>", $row['3.4']);
					printf("<b>Информатика: </b>%s<br>", $row['3.5']);
					printf("<b>Информатика: </b>%s<br>", $row['3.6']);
					echo '<br><big><b><u>Четверг</u></b></big><br>';
					printf("<b>Обществознание: </b>%s<br>", $row['4.1']);
					printf("<b>Английский язык: </b>%s<br>", $row['4.2']);
					printf("<b>Алгебра: </b>%s<br>", $row['4.3']);
					printf("<b>Алгебра: </b>%s<br>", $row['4.4']);
					printf("<b>Физкультура: </b>%s<br>", $row['4.5']);
					printf("<b>География: </b>%s<br>", $row['4.6']);
					echo '<br><big><b><u>Пятница</u></b></big><br>';
					printf("<b>Геометрия: </b>%s<br>", $row['5.1']);
					printf("<b>Геометрия: </b>%s<br>", $row['5.2']);
					printf("<b>Информатика: </b>%s<br>", $row['5.3']);
					printf("<b>Информатика: </b>%s<br>", $row['5.4']);
					printf("<b>Обществознание: </b>%s<br>", $row['5.5']);
					printf("<b>Литература: </b>%s<br>", $row['5.6']);
					printf("<b>Химия: </b>%s<br>", $row['5.7']);
					echo '<br><big><b><u>Суббота</u></b></big><br>';
					printf("<b>Алгебра: </b>%s<br>", $row['6.1']);
					printf("<b>Алгебра: </b>%s<br>", $row['6.2']);
					printf("<b>Русский язык: </b>%s<br>", $row['6.3']);
					printf("<b>Кубановедение: </b>%s<br>", $row['6.4']);
					printf("<b>Физика: </b>%s<br>", $row['6.5']);
					printf("<b>ОБЖ: </b>%s<br>", $row['6.6']);
					mysql_close();
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div> 
	</body>
</html>