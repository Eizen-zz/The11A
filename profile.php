<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
		<? include('style.php'); ?>
		<title>Просмотр профиля</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include('table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span style="width:196px; margin-left: 0;">
					<? 
						printf("Просмотр профиля <br><b>%s</b> (<em>%s %s</em>).", $_SESSION['login'], $_SESSION['name'], $_SESSION['lastname']);
					?>
				</span>
			</div>
			<div id="main">
				<?
					$id = $_SESSION['id'];
					$login = $_SESSION['login'];
					$pass = $_SESSION['pass'];
					include('connect.php');
					$query = mysql_query("SELECT * FROM `users` WHERE `id`='$id'");
					$row = mysql_fetch_array($query, MYSQL_ASSOC);
					echo '<fieldset>';
					echo '<legend>Изменение профиля</legend>';
					echo '<form action="loginchng.php" method="get">'; 
						printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
						printf("<p>Текущий логин - <b>%s</b></p>", $row['login']); 
						printf("<p>Новый логин:</p><input type=\"text\" name=\"login\" size=\"50\">");
						printf("<p><input type=\"submit\" name=\"chng\" value=\"Изменить\">");
					echo '</form>'; 
					echo '<hr>';
					echo '<form action="passchng.php" method="get">';
						printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
						printf("<p>Текущий пароль - <b>%s</b></p>", $row['pass']);
						printf("<p>Новый пароль:</p><input type=\"password\" name=\"pass\" size=\"50\">");
						printf("<p>Подтвердите новый пароль:</p><input type=\"password\" name=\"passcon\" size=\"50\">");
						printf("<p><input type=\"submit\" name=\"chng\" value=\"Изменить\">");
					echo '</form>';
					echo '<hr>';
					echo '<form action=?act=change&w=design>';
						echo '<p>Выберите оформление сайта</p>';
						echo '<select name="subj" size=1>';
							echo '<option value=1 selected>Стандартное</option>';
							echo '<option value=2>Ночное</option>';
						echo '</select>';
					echo '</form>';
					echo '</fieldset>';
					mysql_close();
				?>  
			</div>
			<? include('footer.php'); ?>
		</div>
	</body>
</html>