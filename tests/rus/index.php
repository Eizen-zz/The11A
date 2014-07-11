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
			<?
				$std = date("G");
				if ($std >= 12 && $std < 22) // с 7.00 до 20.59
					include($_SERVER['DOCUMENT_ROOT'] . '/tablen.php'); //ночной дизайн
				else 
					include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); //дневной дизайн
			?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Русский язык, ЕГЭ 2013</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<?
				   $_SESSION['sum'] = 0;
					include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
					$id = $_SESSION['id'];
					$query = mysql_query("SELECT * FROM `users` WHERE `id` = '$id'");
					$row = mysql_fetch_array($query, MYSQL_ASSOC);
					if ($row['done_rus'] == 1)
						echo 'Вы уже выполняли тест. Больше нельзя :(';
					else {
						$task = $_GET['task'];
						if ($task == a1) {
							echo '<span class="B">A1</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a1'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a2" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a2) {
							if (isset($_POST['ans']))
								$_SESSION['a1'] = $_POST['usans'];
							echo '<span class="B">A2</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a2'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a3" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a3) {
							if (isset($_POST['ans']))
								$_SESSION['a2'] = $_POST['usans'];
							echo '<span class="B">A3</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a3'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a4" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a4) {
							if (isset($_POST['ans']))
								$_SESSION['a3'] = $_POST['usans'];
							echo '<span class="B">A4</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a4'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a5" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a5) {
							if (isset($_POST['ans']))
								$_SESSION['a4'] = $_POST['usans'];
							echo '<span class="B">A5</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a5'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a6" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a6) {
							if (isset($_POST['ans']))
								$_SESSION['a5'] = $_POST['usans'];
							echo '<span class="B">A6</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a6'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a7" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a7) {
							if (isset($_POST['ans']))
								$_SESSION['a6'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a7'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							$_SESSION['text7-12']='<b><u>Прочитайте текст и выполните задания A7–A12.</u></b><br>'.$row['712text'];
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A7</span><br>';
							echo $row['task'];
							echo '<form action="?task=a8" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a8) {
							if (isset($_POST['ans']))
								$_SESSION['a7'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a8'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A8</span><br>';
							echo $row['task'];
							echo '<form action="?task=a9" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a9) {
							if (isset($_POST['ans']))
								$_SESSION['a8'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a9'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A9</span><br>';
							echo $row['task'];
							echo '<form action="?task=a10" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a10) {
							if (isset($_POST['ans']))
								$_SESSION['a9'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a10'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A10</span><br>';
							echo $row['task'];
							echo '<form action="?task=a11" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a11) {
							if (isset($_POST['ans']))
								$_SESSION['a10'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a11'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A11</span><br>';
							echo $row['task'];
							echo '<form action="?task=a12" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a12) {
							if (isset($_POST['ans']))
								$_SESSION['a11'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a12'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text7-12'].'<br>';
							echo '<span class="B">A12</span><br>';
							echo $row['task'];
							echo '<form action="?task=a13" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a13) {
							if (isset($_POST['ans']))
								$_SESSION['a12'] = $_POST['usans'];
							echo '<span class="B">A13</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a13'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a14" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a14) {
							if (isset($_POST['ans']))
								$_SESSION['a13'] = $_POST['usans'];
							echo '<span class="B">A14</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a14'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a15" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a15) {
							if (isset($_POST['ans']))
								$_SESSION['a14'] = $_POST['usans'];
							echo '<span class="B">A15</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a15'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a16" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a16) {
							if (isset($_POST['ans']))
								$_SESSION['a15'] = $_POST['usans'];
							echo '<span class="B">A16</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a16'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a17" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a17) {
							if (isset($_POST['ans']))
								$_SESSION['a16'] = $_POST['usans'];
							echo '<span class="B">A17</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a17'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a18" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a18) {
							if (isset($_POST['ans']))
								$_SESSION['a17'] = $_POST['usans'];
							echo '<span class="B">A18</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a18'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a19" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a19) {
							if (isset($_POST['ans']))
								$_SESSION['a18'] = $_POST['usans'];
							echo '<span class="B">A19</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a19'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a20" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a20) {
							if (isset($_POST['ans']))
								$_SESSION['a19'] = $_POST['usans'];
							echo '<span class="B">A20</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a20'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a21" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a21) {
							if (isset($_POST['ans']))
								$_SESSION['a20'] = $_POST['usans'];
							echo '<span class="B">A21</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a21'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a22" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a22) {
							if (isset($_POST['ans']))
								$_SESSION['a21'] = $_POST['usans'];
							echo '<span class="B">A22</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a22'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a23" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a23) {
							if (isset($_POST['ans']))
								$_SESSION['a22'] = $_POST['usans'];
							echo '<span class="B">A23</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a23'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a24" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a24) {
							if (isset($_POST['ans']))
								$_SESSION['a23'] = $_POST['usans'];
							echo '<span class="B">A24</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a24'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a25" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a25) {
							if (isset($_POST['ans']))
								$_SESSION['a24'] = $_POST['usans'];
							echo '<span class="B">A25</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a25'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a26" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a26) {
							if (isset($_POST['ans']))
								$_SESSION['a25'] = $_POST['usans'];
							echo '<span class="B">A26</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a26'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a27" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a27) {
							if (isset($_POST['ans']))
								$_SESSION['a26'] = $_POST['usans'];
							echo '<span class="B">A27</span><br>';
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a27'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $row['task'];
							echo '<form action="?task=a28" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a28) {
							if (isset($_POST['ans']))
								$_SESSION['a27'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a28'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							$_SESSION['text']='<b><u>Прочитайте текст и выполните задания A28–A30, B1-B8.</u></b><br>'.$row['712text'].'<br>';
							echo $_SESSION['text'];
							echo '<span class="B">A28</span><br>';
							echo $row['task'];
							echo '<form action="?task=a29&#t" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a29) {
							if (isset($_POST['ans']))
								$_SESSION['a28'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a29'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<span class="B">A29</span><br>';
							echo $row['task'];
							echo '<a name="t"></a>';
							echo '<form action="?task=a30&#t" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == a30) {
							if (isset($_POST['ans']))
								$_SESSION['a29'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a` WHERE `ntask` = 'a30'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<span class="B">A30</span><br>';
							echo $row['task'];
							echo '<a name="t"></a>';
							echo '<form action="?task=b1&#t" method="post">';
							echo '<input type="radio" name="usans" value="1"> 1) '.$row['v1'].'<br>';
							echo '<input type="radio" name="usans" value="2"> 2) '.$row['v2'].'<br>';
							echo '<input type="radio" name="usans" value="3"> 3) '.$row['v3'].'<br>';
							echo '<input type="radio" name="usans" value="4"> 4) '.$row['v4'].'<br>';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b1) {
							if (isset($_POST['ans']))
								$_SESSION['a30'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b1'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B1</span><br>';
							echo $row['task'];
							echo '<form action="?task=b2&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b2) {
							if (isset($_POST['ans']))
								$_SESSION['b1'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b2'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B2</span><br>';
							echo $row['task'];
							echo '<form action="?task=b3&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b3) {
							if (isset($_POST['ans']))
								$_SESSION['b2'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b3'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B3</span><br>';
							echo $row['task'];
							echo '<form action="?task=b4&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b4) {
							if (isset($_POST['ans']))
								$_SESSION['b3'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b4'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B4</span><br>';
							echo $row['task'];
							echo '<form action="?task=b5&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b5) {
							if (isset($_POST['ans']))
								$_SESSION['b4'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b5'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B5</span><br>';
							echo $row['task'];
							echo '<form action="?task=b6&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b6) {
							if (isset($_POST['ans']))
								$_SESSION['b5'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b6'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B6</span><br>';
							echo $row['task'];
							echo '<form action="?task=b7&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b7) {
							if (isset($_POST['ans']))
								$_SESSION['b6'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b7'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B7</span><br>';
							echo $row['task'];
							echo '<form action="?task=b8&#t" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == b8) {
							if (isset($_POST['ans']))
								$_SESSION['b7'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_b` WHERE `ntask` = 'b8'");
							$row = mysql_fetch_array($query, MYSQL_ASSOC);
							echo $_SESSION['text'];
							echo '<a name="t"></a>';
							echo '<span class="B">B8</span><br>';
							echo $row['task'];
							echo '<form action="?task=res" method="post">';
							echo 'Ответ: <input type="text" name="usans">';
							echo '<input type="submit" name="ans" value="Ответить">';
							echo '</form><hr>';
						}
						elseif ($task == res) {
							if (isset($_POST['ans']))
								$_SESSION['b8'] = $_POST['usans'];
							$query = mysql_query("SELECT * FROM `rustest_a`");
							$i_a = 0;
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
								++$i_a;
								$n = 'a'.$i_a;
								if ($row['answer'] == $_SESSION[$n]) {
									++$_SESSION['sum'];
									echo '<span class="Br">A'.$i_a.'</span> - <b>1</b><br>';
								} else
									echo '<span class="Br">A'.$i_a.'</span> - <b>0</b><br>';
								unset($_SESSION[$n]);
							}
							$query = mysql_query("SELECT * FROM `rustest_b`");
							$i_b = 0;
							while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
								++$i_b;
								$n = 'b'.$i_b;
								if ($row['answer'] == $_SESSION[$n]) {
									++$_SESSION['sum'];
									echo '<span class="Br">B'.$i_b.'</span> - <b>1</b><br>';
								} else
									echo '<span class="Br">B'.$i_b.'</span> - <b>0</b><br>';
								unset($_SESSION[$n]);
							}
							echo 'Правильно сделано '.$_SESSION['sum'];
							$score = $_SESSION['sum'];
							$id = $_SESSION['id'];
							$query = mysql_query("UPDATE `users` SET `score`='$score', `done`='1' WHERE `id`='$id'");
						}
						else  {
							echo '<span class="news">Добро пожаловать на online-тестирование по Русскому языку от сайта The11A.<br>';
							echo 'В данном тесте содержится части "А и ""В" ЕГЭ по Русскому языку. Чтобы дать ответ на задание части "А", выберите вариант ответа, нажав на соответсвующую кнопку. Ответы части "В" вписываются в специальное поле для ввода ответа.<br>';
							echo '<big><big>Система работает в тестовом режиме.</big></big><br>';
							echo '<a href="?task=a1"><big>Начать тест</big></a></span>';
						}
					}
					mysql_close();
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>