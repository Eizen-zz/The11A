<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<link href="style.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="main.js"></script>
		<title>Чат</title>
	</head>
	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Чат</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main" style="padding: 0;">
				<div style="padding: 10px;">
					<b>Чат-рум/#11A</b><br>
					<div style="border: 1px ridge white; width:800px;">
					Пока бобры, да, те самые, доносят ваши пакеты данных до сервера, подождите 10 секунд. В чате загрузится последнее сообщение. Главное - ждите. Мы работаем над совершенствованием чата.
					</div>
					<a href="/">На главную</a>  |  <a href="history.php">История сообщений</a>
					<!-- Вот в этих 2-х div'ах будут идти наши сообщения из чата -->
					<div class="chat r4">

					<div id="chat_area"><!-- Сюда мы будем добавлять новые сообщения --></div>
					</div>
					<form id="pac_form" action=""><!-- Наша форма с именем, сообщением и кнопкой для отправки -->
						<table style="width: 100%;">
							<?
								include ('connect.php');
								$id = $_SESSION['id'];
								$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
								$row = mysql_fetch_array($query, MYSQL_ASSOC);
								if ($row['chatrule'] == 1)
							{	
								echo '<tr>';
								echo '<td>'; 
								printf("Имя: %s %s", $_SESSION['name'], $_SESSION['lastname']);
								echo '</td>';
								echo'<td>Сообщение:</td>';
								echo '<td></td>';
								echo '</tr>';
								echo '<tr>';
								//Поле имени
								echo '<td>';
								$name = $_SESSION['name']." ".$_SESSION['lastname'];
								printf("<input type=\"hidden\" id=\"pac_name\" class=\"r4\" value=\"%s\">", $name);
								echo '</td>';
								//Поле ввода сообщения 
								echo '<td style="width: 80%;"><input type="text" id="pac_text" class="r4" value=""></td>';
								echo '<td><input type="submit" class="myButton" value=""></td>';
								echo '</tr>';
							}
							mysql_close();
							?>
						</table>
					</form>
				</div>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div> 
	</body>
</html>