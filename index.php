<?php
	session_start();
	$file = "ip.txt";
	$rfile = fopen($file, 'a+');
	$today = date(d.m.y);
	$time = date(H.i.s);
	$source = $_SERVER['REMOTE_ADDR'].' '.$today.' '.$time."\n";
	fwrite($rfile, $source);
	fclose($rfile);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<meta name="keywords" content="школьный сайт, 11 А, ЕГЭ, информационный портал, Краснодар, лицей 4, бобры">
		<meta property="og:image" content="/img/thumbnail.png">
		<meta property="og:title" content="Информационный портал 11 А класса, 4 лицей, Краснодар.">
		<meta name="description" content="Информационный портал 11 А класса.">
		<? include('style.php'); ?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<title>В гостях у 11 "А"</title>
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
			include('connect.php');
			$query = mysql_query("SELECT * FROM `messages` ORDER BY `id` DESC");
			$row = mysql_fetch_array($query, MYSQL_ASSOC);
			$time = strtotime($row['date']);
			$now = strtotime('now');
			echo '<div id="chat_stat">';
			echo '<b>Состояние чата: </b><br>';
			if (($time - $now) > 17400)
				echo '<img src="/img/on.jpg" />';
			else { 
				echo '<img src="/img/off.jpg" /><br>';
				$t = substr($row['date'], 11, 18);
				echo 'Последнее сообщение в '.$t.' (по Гринвичу) от: '.$row['name'];
			}
			echo '</div>';
			mysql_close;	 
		?> 

		<div class="user_panel">
		<?
			if (!isset($_SESSION['login'])) {
				//echo "<u>Добро пожаловать, гость.</u>";
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
			if ($_SESSION['status'] ==2 )	
				echo '<span><a href="http://the11a.16mb.com/admin/addnews.php">[Добавить новость]</a></span><br>';
			echo '<span class="news-head">Архив новостей</span>';
			echo '<hr class="news_hr">';
			//для дней рождений место
			//<FilesMatch "(script)$">
			//ForceType application/x-httpd-php
			//</FilesMatch> //для index вместо index.php
			include('connect.php');
			$page = intval($_GET['page']);
			$num = 10; //количество сообщений выводимых на станице
			if ($page==0)
				$page=1;	
			$query = "SELECT COUNT(*) FROM `news`"; // Определяем общее число сообщений в базе данных
			$mysql_result = mysql_query($query);
			if(mysql_num_rows($mysql_result)>0) {
				$count=mysql_fetch_row($mysql_result);
			}
			$posts = $count[0]; // получем значение кол-во всех записей
			$total = intval(($posts - 1) / $num) + 1; // Находим общее число страниц
			$page = intval($page); // Определяем начало сообщений для текущей страницы
			// Если значение $page меньше единицы или отрицательно,
			// переходим на первую страницу,
			// a если слишком большое, то переходим на последнюю.
			if(empty($page) or $page < 0)
				$page = 1;
			if($page > $total) $page = $total; // Вычисляем начиная к какого номера следует выводить сообщения
			$start = $page * $num - $num;
			// Проверяем нужны ли стрелки назад
			if ($page != 1)
				$pervpage = '<a href="http://the11a.16mb.com/index.php?page=1">В начало |</a>
							<a href="http://the11a.16mb.com/index.php?page='. ($page - 1).'">Назад |</a> ';
			// Проверяем нужны ли стрелки вперед
			if ($page != $total)
				$nextpage = '  <a href="http://the11a.16mb.com/index.php?page='. ($page + 1).'">| Вперед</a>
								<a href="/index.php?page='.$total.'"> | В конец</a> ';
			// Находим две ближайшие станицы с обоих краев, если они есть
			if($page - 2 > 0)
				$page2left = ' <a href="http://the11a.16mb.com/index.php?page='. ($page - 2) .'">'. ($page - 2) .'</a>  ';
			if($page - 1 > 0)
				$page1left = '<a href="http://the11a.16mb.com/index.php?page='. ($page - 1) .'">'. ($page - 1) .'</a>  ';
			if($page + 2 <= $total)
				$page2right = '  <a href="http://the11a.16mb.com/index.php?page='. ($page + 2).'">'. ($page + 2) .'</a>';
			if($page + 1 <= $total)
				$page1right = '  <a href="http://the11a.16mb.com/index.php?page='. ($page + 1).'">'. ($page + 1) .'</a>';

			$result = mysql_query("SELECT * FROM `news` ORDER BY `id` DESC LIMIT $start, $num");
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
				echo '<div class="news-block">';
				printf("<a href=\"http://the11a.16mb.com/news.php?id=%d\"><span class=\"news_title\">%s</span></a><br>", $row['id'], $row['title']);
				printf("<span class=\"news\">%s</span><br>", $row['desc']);
				printf("<span class=\"time\">%s</span><br>", $row['date']);
				if ($_SESSION['status']==2) {
					echo '<form action="admin/chngnews.php" method="post">';
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					echo '<input type="submit" name="chng" value="Изменить">';
					echo '</form>';
					echo '<form action="admin/addnews.php?act=delete" method="post">';
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					echo '<input type="submit" name="del" value="Удалить">';
					echo '</form>';
				}
				echo '</div>';
			}
			if ($total>1)
			echo '<p><big>'.$pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage.'</big></p>';
			mysql_close();
		?>

		</div>
		<? include('footer.php'); ?>
		</div>
	
	</body>
</html>
