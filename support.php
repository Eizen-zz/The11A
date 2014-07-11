<? session_start(); ?>
<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="utf-8">
			<meta property="og:image" content="/img/thumbnail.png">
			<meta property="og:title" content="Поддержка The11A">
			<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
			<? include('style.php'); ?>
			<script src="/js/main.js"></script>
			<title>Поддержка сайта</title>
		</head>

		<body>
		
		<div id="container">
			<div id="header"></div>
			<? include('table.php'); ?>
		</div>
   
		<div id="content">
			<div id="sidebar">
				<div class="sb_links">
					<img src="/img/help.jpg" />
					<ul>
						<li><a href="about.php?help=about">О сайте</a></li>
						<li><a href="about.php?help=rules">Правила The11A</a></li>
						<li><a href="support.php?act=ask">Поддержка пользователей</a></li>
						<li><a href="about.php?help=team">Команда The11A</a></li>
					</ul>
				</div>
			</div>
		<div id="main">
			<?
			if ($_SESSION['online'] == 1) {
				$act = ($_GET['act']);
				
				if ($act == "ask") {?>
					<ul>
						<li><a href="support.php">Мои вопросы</a></li>
						<li><a href="http://the11a.16mb.com/">Вернуться</a></li>   
					</ul>
					<fieldset>
						<legend class="sup_w">Задайте вопрос, сообщите об ошибках, выскажите предложения по работе сайта.</legend>
						<u>Пример:</u>
						<br>
						<b>Тема вопроса: </b>ошибка работы сайта.<br>
						<b>Вопрос: </b>День добрый. Я перешел по ссылке http://the11a.16mb.com/admin/, а мне там про бобров выдало. Это какая-то ошибка??
						<hr class="news_hr">
						<form action="/support.php?act=sub_ask" method="post">
							<p>Тема вопроса:</p><input type="text" name="topic" id="topic" size="60" onBlur="checkTopic(this, document.getElementById('topic_help'));"><br>
							<span id="topic_help" class="help"></span>
							<p>Вопрос:</p><textarea name="subj" id="subj" cols="50" rows="10" onBlur="checkQuestion(this, document.getElementById('question_help'));"></textarea><br>
							<span id="question_help" class="help"></span>
							<p><button type="button" onClick="checkRegister(this.form);">Задать</button></p>
						</form>
					</fieldset>
				<?}
				else  {
					echo '<ul>';
					echo '<li><a href="support.php?act=ask">Задать вопрос</a></li>';
					echo '<li><a href="http://the11a.16mb.com/">Вернуться</a></li>';
					echo '</ul>';
					echo '<span class="support">';	
					echo 'Здесь вы можете просмотреть ответы на заданные вами вопросы.</span>';
					$login=$_SESSION['login'];
					include('connect.php');
					$query = mysql_query("SELECT  * FROM `support` WHERE `author`='$login' ORDER BY `id` DESC");
					while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
						if (!empty($row['answer']))
							echo '<div id="pic"><img src="/img/ans.png" /></div>';
						printf("<p><b>Тема вопроса: </b>%s</p>", $row['topic']);
						printf("<p><b>Вопрос: </b>%s</p>", $row['subj']);
						if (empty($row['answer'])) {
							echo '<p style="background:red; color: #FFF;" align="left">';
							echo 'Ожидайте ответа</p>';
						}
						else {
							printf("<b>Ответ: </b>%s", $row['answer']);
						}
					echo '<hr class="news_hr">';
					}
					mysql_close();
				}
				
				if ($act == "sub_ask" && $_SESSION['online'] == 1 && isset($_POST['topic']) && isset($_POST['subj'])) {
					$topic = $_POST['topic'];
					$subj = $_POST['subj'];
					$stat = 0;
					$author = $_SESSION['login'];
					include('connect.php');
					$query = mysql_query("INSERT INTO `support` (`topic`, `subj`, `status`, `author`) VALUES ('$topic', '$subj', '$stat', '$author')");
					mysql_close();
					echo '<script>window.location = "/support.php"</script>';
				}
			}
			else echo 'Извините, но поддержкой могут пользоваться только участники ресурса.';
			?>
		</div>
		<? include('footer.php'); ?>
		</div>
	</body>
</html>