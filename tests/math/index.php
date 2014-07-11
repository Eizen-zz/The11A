<?
session_start();
if ($_SESSION['online'] != 1)
exit('<p style="background:#000; color: #FFF;" align="center">Извините, но проходить тестирование могут только авторизованные пользователи. Авторизацию пройдите по следующей ссылке.</p><p align="center"><a href="http://the11a.16mb.com/login.php">Тут.</a></p>');
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Информационный портал 11 А класса." />
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Online-тестирование</title>
	</head>
	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Математика, ЕГЭ 2013</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<?
					$_SESSION['sum'] = 0;
					include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
					$id = $_SESSION['id'];
					$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
					$row = mysql_fetch_array($query, MYSQL_ASSOC);
					if ($row['done'] == 1)
						echo 'Вы уже выполняли тест. Больше нельзя :(';
					else	{
						$task = $_GET['task'];
						if ($task == b1) {
							echo '<span class="B">B1</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b1'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b2" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1"><span class="cur-task">1</span> </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b2) {
							if (isset($_POST['ans']))
								$_SESSION['b1'] = $_POST['usans'];
							echo '<span class="B">B2</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b2'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b3" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2"><span class="cur-task">2</span> </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b3) {
							if (isset($_POST['ans']))
								$_SESSION['b2'] = $_POST['usans'];
							echo '<span class="B">B3</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b3'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b4" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3"><span class="cur-task">3</span> </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b4) {
							if (isset($_POST['ans']))
								$_SESSION['b3'] = $_POST['usans'];
							echo '<span class="B">B4</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b4'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b5" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4"><span class="cur-task">4</span> </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b5) {
							if (isset($_POST['ans']))
								$_SESSION['b4'] = $_POST['usans'];
							echo '<span class="B">B5</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b5'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b6" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5"><span class="cur-task">5</span> </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b6) {
							if (isset($_POST['ans']))
								$_SESSION['b5'] = $_POST['usans'];
							echo '<span class="B">B6</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b6'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b7" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6"><span class="cur-task">6</span> </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b7) {
							if (isset($_POST['ans']))
								$_SESSION['b6'] = $_POST['usans'];
							echo '<span class="B">B7</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b7'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b8" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7"><span class="cur-task">7</span> </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b8) {
							if (isset($_POST['ans']))
								$_SESSION['b7'] = $_POST['usans'];
							echo '<span class="B">B8</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b8'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b9" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8"><span class="cur-task">8</span> </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b9) {
							if (isset($_POST['ans']))
								$_SESSION['b8'] = $_POST['usans'];
							echo '<span class="B">B9</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b9'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b10" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9"><span class="cur-task">9</span> </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b10) {
							if (isset($_POST['ans']))
								$_SESSION['b9'] = $_POST['usans'];
							echo '<span class="B">B10</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b10'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b11" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10"><span class="cur-task">10</span> </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b11) {
							if (isset($_POST['ans']))
								$_SESSION['b10'] = $_POST['usans'];
							echo '<span class="B">B11</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b11'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b12" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11"><span class="cur-task">11</span> </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b12) {
							if (isset($_POST['ans']))
								$_SESSION['b11'] = $_POST['usans'];
							echo '<span class="B">B12</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b12'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b13" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12"><span class="cur-task">12</span> </a><a href="?task=b13">13 </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b13) {
							if (isset($_POST['ans']))
								$_SESSION['b12'] = $_POST['usans'];
							echo '<span class="B">B13</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b13'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=b14" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13"><span class="cur-task">13</span> </a><a href="?task=b14">14 </a></span>';
							echo '</div>';
						}
						elseif ($task == b14) {
							if (isset($_POST['ans']))
								$_SESSION['b13'] = $_POST['usans'];
							echo '<span class="B">B14</span><br>';
							$query = mysql_query("SELECT * FROM `mathtest` WHERE `ntask` = 'b14'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=res" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><br><hr>';
							echo '<div id="ntask">';
							echo '<span class="tasks"><a href="?task=b1">1 </a><a href="?task=b2">2 </a><a href="?task=b3">3 </a><a href="?task=b4">4 </a><a href="?task=b5">5 </a><a href="?task=b6">6 </a><a href="?task=b7">7 </a><a href="?task=b8">8 </a><a href="?task=b9">9 </a><a href="?task=b10">10 </a><a href="?task=b11">11 </a><a href="?task=b12">12 </a><a href="?task=b13">13 </a><a href="?task=b14"><span class="cur-task">14</span> </a></span>';
							echo '</div>';
						}
						elseif ($task == res) {
							if (isset($_POST['ans']))
								$_SESSION['b14'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `mathtest`");
							$i = 0;
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
								++$i;
								$n = 'b'.$i;
								if ($row['answer'] == $_SESSION[$n])
								{
								++$_SESSION['sum'];
								echo '<span class="Br">B'.$i.'</span> - <b>1</b><br>';
								}
								else echo '<span class="Br">B'.$i.'</span> - <b>0</b><br>';
								unset($_SESSION[$n]);
							}
							echo 'Правильно сделано '.$_SESSION['sum'];
							$score = $_SESSION['sum'];
							$id = $_SESSION['id'];
							$query = mysql_query("UPDATE `users` SET `score`='$score', `done`='1' WHERE `id`='$id'");
						}
						else {
							echo '<span class="news">Добро пожаловать на online-тестирование по математике от сайта The11A.<br>';
							echo 'В данном тесте содержится часть "В" ЕГЭ по математике. Ответы вписываются в специальное окно. Ответы представляют собой, как и положено, целые числа или же числа в десятичной записи.<br>';
							echo 'Внимание! Целая часть от дробной отделяется <b>точкой</b>. Вариант с запятой обработается как ошибочный. Например, если ответ 2.4, то 2,4 будет ошибкой.<br>Удачи!<br>';
							echo '<a href="?task=b1"><big>Начать тест</big></a></span>';
						}
					
					
					}
					mysql_close();
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>