<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="description" content="Список дежурных 11 А класса.">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Дежурство</title>
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
					$par = $_GET['act'];
					if ($par == 'show' && isset($_POST['id'])) {
						echo 'А дежуришь ты.. ';
						$id = $_POST['id'];
						include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
						$query = mysql_query("SELECT * FROM `users` WHERE `id`='$id'");
						$row = mysql_fetch_array($query, MYSQL_ASSOC);
						$duty = $row['duty'];
						switch($duty) {
							case 1:
							$day = 'в понедельник.';
							break;
							
							case 2:
							$day = 'во вторник.';
							break;
							
							case 3:
							$day = 'в среду.';
							break;
							
							case 4:
							$day = 'в четверг.';
							break;
							
							case 5:
							$day = 'в пятницу.';
							break;
							
							case 6:
							$day = 'в субботу.';
							break;
						}
						printf("<big><big><big><em><u>%s</u></em></big></big></big><br>", $day);
						echo '<img src=/img/vedro.gif width=200px height=200px />';
						echo '<a href="/duty/">Посмотреть полный список дежурных</a>';
						mysql_close();
					}
					else {
						$list_file = fopen("list.txt", "r"); // файл с рабами
						if ($list_file)
							while (!feof($list_file))
								$slaves[] = fgets($list_file); // в переводе с английского slaves - рабы :]
						else
							echo "Ошибка при чтении файла. Попробуйте позже.";
						$today = date(l);
						switch($today) {
							case 'Monday':
								$today='Понедельник';
							break;
							
							case 'Tuesday':
								$today='Вторник';
							break;
							
							case 'Wednesday':
								$today='Среда';
							break;
							
							case 'Thursday':
								$today='Четверг';
							break;

							case 'Friday':
								$today='Пятница';
							break;
							
							case 'Saturday':
								$today='Суббота';
							break;
							
							case 'Sunday':
								$today='Воскресенье';
							break;
						}
						echo "<div class=\"duty\">";
						echo "<h1>Сегодня: $today</h1>";
						echo "<h2>Дежурные:</h2>";
						echo "<ul>";
						$today = date(l);
						switch ($today) {
							case Monday:
								for ($i = 0; $i < 5; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;

							case Tuesday:
								for ($i = 5; $i < 9; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;

							case Wednesday:
								for ($i = 9; $i < 14; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;

							case Thursday:
								for ($i = 14; $i < 19; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;

							case Friday:
								for ($i = 19; $i < 23; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;

							case Saturday:
								for ($i = 23; $i < 26; $i++)
									echo '<li>'.$slaves[$i].'</li>';
							break;
						}
						echo "</ul>";
						echo "</div>";
					}
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div> 
	</body>
</html>