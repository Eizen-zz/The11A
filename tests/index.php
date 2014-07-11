<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<script>
			active11 = new Image(450,80);
			active11.src = "/img/math1.png";
			button11 = new Image(450,80);
			button11.src = "/img/math.png";
		</script>
		<title>Online-тестирования</title>
	</head>
	<body>
		<div id="container">
		<div id="header"></div>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
		<div id="content">
			<div id="sidebar">
				<span>Online-тестирования</span>
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<?
					if ($_SESSION['online'] == 1) {
						echo '<ul>';
							echo '<li><a href="math/" onMouseOver="button11.src=active11.src; window.status=\'\';return true" onMouseOut="button11.src=\'/img/math.png\'">';
							echo '<img name="button11" img border="0" src="/img/math.png" width="183px" height="60px"/></a>';
						echo '</ul>';
					}
					else
						echo 'Проходить тестирования могут только авторизованные пользователи.';
				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>