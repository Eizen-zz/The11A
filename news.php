<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Информационный портал 11 А класса.">
		<meta property="og:image" content="/img/thumbnail.png">
		<meta property="og:title" content="Новостная лента The11A">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<? include('style.php'); ?>
		<title>В гостях у 11 "А" - Новости</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include('table.php'); ?>
		</div>
   
		<div id="content">
			<div id="sidebar">
				<div id="advice">
					<? 
						$today=date(l); 
						switch($today) {
							case 'Monday':
							$today='Понедельник.';
							break;
							
							case 'Tuesday':
							$today='Вторник.';
							break;
							
							case 'Wednesday':
							$today='Среда.';
							break;
							
							case 'Thursday':
							$today='Четверг.';
							break;
							
							case 'Friday':
							$today='Пятница.';
							break;
							
							case 'Saturday':
							$today='Суббота.';
							break;
							
							case 'Sunday':
							$today='Воскресенье.';
							break;
						}
						echo "<b>Сегодня </b>- $today<br>";
						echo '<b>Совет дня: </b><em>';
						include('advice.php');
						echo '</em>';
						echo '</div>';	 
					?> 
				<div class="user_panel">
					<?
						if (!isset($_SESSION['login'])) {
							echo "<u>Добро пожаловать, гость.</u>";
							echo "<form action=\"authorize.php\" method=\"post\">";
							echo "<br>Логин:<br>";
							echo "<input type=\"text\" name=\"login\"><br>";
							echo "Пароль:<br>";
							echo "<input type=\"password\" name=\"pass\"><br>";
							echo "<input type=\"submit\" name=\"Submit\" value=\"Войти\"></form>";	
						}

						elseif (isset($_SESSION['user']) || $_SESSION['status']==0) {
							$name = $_SESSION['lastname'].' '.$_SESSION['name'];
							printf("<span class=\"username\">%s</span>", $name);
							echo '<ul>';
							echo '<li><a href="profile.php">Изменить профиль</a>';
							echo '<li><a href="logout.php">Выйти</a>';
							echo '</ul>';
						}

						elseif (isset($_SESSION['user']) || $_SESSION['status']==1) {
							$name = $_SESSION['lastname'].' '.$_SESSION['name'].' '.$_SESSION['fname'];
							printf("<span class=\"username\">%s</span>", $name);
							echo '<ul>';
							echo '<li><a href="profile.php">Изменить профиль</a>';
							echo '<li><a href="admin/addtnew.php">Добавить объявление</a>';
							echo '<li><a href="admin/addstudy.php">Добавить материал</a>';
							echo '<li><a href="admin/addht.php">Добавить д/з</a>';
							echo '<li><a href="logout.php">Выйти</a>';
							echo '</ul>';
						}

						elseif (isset($_SESSION['user']) || $_SESSION['status'] == 3) {
							$name = $_SESSION['lastname'].' '.$_SESSION['name'];
							printf("<span class=\"username\">%s</span>", $name);
							echo '<ul>';
							echo '<li><a href="profile.php">Изменить профиль</a>';
							echo '<li><a href="admin/addht.php">Добавить д/з</a>';
							echo '<li><a href="logout.php">Выйти</a>';
							echo '</ul>';
						}

						elseif (isset($_SESSION['user']) || $_SESSION['status'] == 2) {
							$name = $_SESSION['lastname'].' '.$_SESSION['name'];
							printf("<span class=\"username\">%s</span>", $name);
							echo '<ul>';
							echo '<li><a href="profile.php">Изменить профиль</a>';
							echo '<li><a href="./admin/">Администрирование</a>';
							include('connect.php');
							$query = mysql_query("SELECT COUNT(*) FROM `support` WHERE `status`='0'");
							$row = mysql_fetch_row($query);
							printf("<li>Новых вопросов: <a href=\"http://the11a.16mb.com/admin/support.php?act=ans\" target=\"_blank\"><b>%d</b></a>", $row[0]);
							mysql_close();
							echo '<li><a href="logout.php">Выйти</a>';
							echo '</ul>';
						}

					?>
				</div>
				<? include('sidebar.php'); ?>
			</div>
		
		<div id="main">
			<? 
			include('connect.php');
			$id = $_GET['id'];

			$query = mysql_query("SELECT * FROM `news` WHERE `id`='$id'");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			if (!isset($row['date']))
			echo '<u><big>Извините, но запращиваемая вами страница <big>не найдена.</big> Просим прощения.</big></u>';
			else {

				printf("<span class=\"news_title\">%s</span><br>", $row['title']);
				printf("<span class=\"news\">%s</span><br>", $row['text']);
				printf("<span class=\"time\">%s</span><br>", $row['date']);
				if ($_SESSION['status'] == 2)
				{
				echo '<form action="admin/chngnews.php" method="post">';
				printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
				echo '<input type="submit" name="chng" value="Изменить">';
				echo '</form>';
				echo '<form action="admin/addnews.php?act=delete" method="post">';
				printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
				echo '<input type="submit" name="del" value="Удалить">';
				echo '</form>';
				}
			}
			mysql_close();
			?>
		</div>
		<? include('footer.php'); ?>
		</div>
	</body>
</html>
