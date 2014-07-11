<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta property="og:image" content="/img/thumbnail.png">
		<meta property="og:title" content="Объявления от преподавателй сайта The11A">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta name="description" content="Объявление от преподавателей на сайте The11A">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Объявления от преподавателей</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>  
  
		<div id="content">
			<div id="sidebar">
				<b>Объявления от <br>преподавателей</b>
				<? if ($_SESSION['status'] == 1 || $_SESSION['status'] == 2) 
					echo '<br><a href="/admin/addtnew.php">[Добавить объявление]</a>'; ?>
				<hr class="sb_hr">
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<? 
				include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');

				$page = intval($_GET['page']); // значение текущей страницы из GET
				$num = 10; // Переменная хранит число сообщений выводимых на станице
				if ($page==0) $page=1;
				// Определяем общее число сообщений в базе данных
				$query = "SELECT COUNT(*) FROM `teach`";
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
				if ($page != 1) $pervpage = '<a href="http://the11a.16mb.com/teach.php?page=1">В начало |</a>
				<a href="http://the11a.16mb.com/teach.php?page='. ($page - 1).'">Назад |</a> ';
				// Проверяем нужны ли стрелки вперед
				if ($page != $total) $nextpage = '  <a href="http://the11a.16mb.com/teach.php?page='. ($page + 1).'">| Вперед</a>
				<a href="/teach.php?page='.$total.'"> | В конец</a> ';
				// Находим две ближайшие станицы с обоих краев, если они есть
				if($page - 2 > 0) $page2left = ' <a href="http://the11a.16mb.com/teach.php?page='. ($page - 2) .'">'. ($page - 2) .'</a>  ';
				if($page - 1 > 0) $page1left = '<a href="http://the11a.16mb.com/teach.php?page='. ($page - 1) .'">'. ($page - 1) .'</a>  ';
				if($page + 2 <= $total) $page2right = '  <a href="http://the11a.16mb.com/teach.php?page='. ($page + 2).'">'. ($page + 2) .'</a>';
				if($page + 1 <= $total) $page1right = '  <a href="http://the11a.16mb.com/teach.php?page='. ($page + 1).'">'. ($page + 1) .'</a>';

				$result = mysql_query("SELECT * FROM `teach` ORDER BY `id` DESC LIMIT $start, $num");
				while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
				{
					printf("<span class=\"teach_title\">%s</span><br>", $row['title']);
					printf("<span class=\"teach\">%s</span><br><br>", $row['text']);
					if (!empty($row['afile']))
					printf("<font size=\"+0\"><i><a href=\"%s\">Ссылка</a></i></font><br>", $row['afile']);
					printf("(<em>%s</em>)<br>", $row['name']);
					if ($_SESSION['status']==2 or $_SESSION['status']==1)
					{
					echo '<form action="/admin/chngtnew.php" method="post">';
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					echo '<input type="submit" name="chng" value="Изменить">';
					echo '</form>';
					echo '<form action="/admin/addtnew.php?act=delete" method="post">';
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					echo '<input type="submit" name="del" value="Удалить">';
					echo '</form>';
					}
					echo '<hr class="news_hr">';
				}
				if ($total>1) echo '<p><big>'
				.$pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right
				.$nextpage.'</big></p>';

				mysql_close();
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div> 
	</body>
</html>
