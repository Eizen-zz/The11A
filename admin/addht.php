<?php
session_start();
if ($_SESSION['status'] == 0 || $_SESSION['online'] != 1)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Добавление Д/З</title>
	<head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				Добавление домашего задания
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
			<?
				include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
				$query = mysql_query("SELECT * FROM `hometask`");
				$row = mysql_fetch_array($query, MYSQL_ASSOC);
				$day = $_GET['day'];
				switch($day) {
					case 'monday': {?>
						<form action="htadd.php" method="post">
							Биология : <textarea name="task" cols="20" rows="3"><?echo $row['1.1'];?></textarea><br>
							<input type="hidden" name="les" value="1.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Физкультура : <textarea name="task" cols="20" rows="3"><?echo $row['1.2'];?></textarea><br>
							<input type="hidden" name="les" value="1.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['1.3'];?></textarea><br>
							<input type="hidden" name="les" value="1.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['1.4'];?></textarea><br>
							<input type="hidden" name="les" value="1.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Английский язык : <textarea name="task" cols="20" rows="3"><?echo $row['1.5'];?></textarea><br>
							<input type="hidden" name="les" value="1.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							История : <textarea name="task" cols="20" rows="3"><?echo $row['1.6'];?></textarea><br>
							<input type="hidden" name="les" value="1.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					case 'tuesday': {?>
						<form action="htadd.php" method="post">
							Геометрия : <textarea name="task" cols="20" rows="3"><?echo $row['2.1'];?></textarea><br>
							<input type="hidden" name="les" value="2.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Геометрия : <textarea name="task" cols="20" rows="3"><?echo $row['2.2'];?></textarea><br>
							<input type="hidden" name="les" value="2.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Литература : <textarea name="task" cols="20" rows="3"><?echo $row['2.3'];?></textarea><br>
							<input type="hidden" name="les" value="2.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Физкультура : <textarea name="task" cols="20" rows="3"><?echo $row['2.4'];?></textarea><br>
							<input type="hidden" name="les" value="2.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Литература : <textarea name="task" cols="20" rows="3"><?echo $row['2.5'];?></textarea><br>
							<input type="hidden" name="les" value="2.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Английский язык : <textarea name="task" cols="20" rows="3"><?echo $row['2.6'];?></textarea><br>
							<input type="hidden" name="les" value="2.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					case 'wednesday': {?>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['3.1'];?></textarea><br>
							<input type="hidden" name="les" value="3.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['3.2'];?></textarea><br>
							<input type="hidden" name="les" value="3.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Физика : <textarea name="task" cols="20" rows="3"><?echo $row['3.3'];?></textarea><br>
							<input type="hidden" name="les" value="3.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							История : <textarea name="task" cols="20" rows="3"><?echo $row['3.4'];?></textarea><br>
							<input type="hidden" name="les" value="3.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Информатика : <textarea name="task" cols="20" rows="3"><?echo $row['3.5'];?></textarea><br>
							<input type="hidden" name="les" value="3.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Информатика : <textarea name="task" cols="20" rows="3"><?echo $row['3.6'];?></textarea><br>
							<input type="hidden" name="les" value="3.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					case 'thursday': {?>
						<form action="htadd.php" method="post">
							Обществознание : <textarea name="task" cols="20" rows="3"><?echo $row['4.1'];?></textarea><br>
							<input type="hidden" name="les" value="4.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Английский язык : <textarea name="task" cols="20" rows="3"><?echo $row['4.2'];?></textarea><br>
							<input type="hidden" name="les" value="4.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['4.3'];?></textarea><br>
							<input type="hidden" name="les" value="4.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['4.4'];?></textarea><br>
							<input type="hidden" name="les" value="4.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Физкультура : <textarea name="task" cols="20" rows="3"><?echo $row['4.5'];?></textarea><br>
							<input type="hidden" name="les" value="4.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							География : <textarea name="task" cols="20" rows="3"><?echo $row['4.6'];?></textarea><br>
							<input type="hidden" name="les" value="4.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					case 'friday': {?>
						<form action="htadd.php" method="post">
							Геометрия : <textarea name="task" cols="20" rows="3"><?echo $row['5.1'];?></textarea><br>
							<input type="hidden" name="les" value="5.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Геометрия : <textarea name="task" cols="20" rows="3"><?echo $row['5.2'];?></textarea><br>
							<input type="hidden" name="les" value="5.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Информатика : <textarea name="task" cols="20" rows="3"><?echo $row['5.3'];?></textarea><br>
							<input type="hidden" name="les" value="5.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Информатика : <textarea name="task" cols="20" rows="3"><?echo $row['5.4'];?></textarea><br>
							<input type="hidden" name="les" value="5.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Обществознание : <textarea name="task" cols="20" rows="3"><?echo $row['5.5'];?></textarea><br>
							<input type="hidden" name="les" value="5.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Литература : <textarea name="task" cols="20" rows="3"><?echo $row['5.6'];?></textarea><br>
							<input type="hidden" name="les" value="5.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Химия : <textarea name="task" cols="20" rows="3"><?echo $row['5.7'];?></textarea><br>
							<input type="hidden" name="les" value="5.7">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					case 'saturday': {?>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['6.1'];?></textarea><br>
							<input type="hidden" name="les" value="6.1">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Алгебра : <textarea name="task" cols="20" rows="3"><?echo $row['6.2'];?></textarea><br>
							<input type="hidden" name="les" value="6.2">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Русский язык : <textarea name="task" cols="20" rows="3"><?echo $row['6.3'];?></textarea><br>
							<input type="hidden" name="les" value="6.3">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Кубановедение : <textarea name="task" cols="20" rows="3"><?echo $row['6.4'];?></textarea><br>
							<input type="hidden" name="les" value="6.4">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							Физика : <textarea name="task" cols="20" rows="3"><?echo $row['6.5'];?></textarea><br>
							<input type="hidden" name="les" value="6.5">
							<input type="submit" name="add" value="Добавить">
						</form><br>
						<form action="htadd.php" method="post">
							ОБЖ : <textarea name="task" cols="20" rows="3"><?echo $row['6.6'];?></textarea><br>
							<input type="hidden" name="les" value="6.6">
							<input type="submit" name="add" value="Добавить">
						</form><br>
					<?}
					break;
					default: {?>
					<a href="?day=monday">Понедельник</a>  |
					<a href="?day=tuesday">Вторник</a>  |
					<a href="?day=wednesday">Среда</a>  |
					<a href="?day=thursday">Четверг</a>  |
					<a href="?day=friday">Пятница</a>  |
					<a href="?day=saturday">Суббота</a><br>
					<?}
					break;
				}
			?>	
			
		   </div>
   		</div>
	</body>
</html>