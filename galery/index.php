<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta property="og:image" content="/img/thumbnail.png">
		<meta property="og:title" content="Галерея сайта The11A">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Галерея</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>
  
		<div id="content">
			<div id="sidebar">
				<big><u>Галерея</u></big><br>
				Наши фото. Наш формат.
				<ul type="disc" style="margin: 0;">
					<?
					include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
					$query = mysql_query("SELECT * FROM `albums`");
					while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
					printf("<li><a href=\"?album=%s\">%s</a>", $row['title'], $row['title']);
					mysql_close();
					?>
				</ul>
			</div>
	   <div id="main">
			<div class="galery">
				<?
					$album = $_GET['album'];
					if (isset($album))
					{
					include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
					$query = mysql_query("SELECT * FROM `photos` WHERE `album`='$album'");
					$i = 0;
					while ($row = mysql_fetch_array($query, MYSQL_ASSOC))
					{
						printf("<img class=\"galery_img\" src=\"%s\" width=\"500px\" heigth=\"300px\" />", $row['src']);
						echo '<hr id="g_hr">';
						++$i;
					}
					if ($i == 0) echo 'нет фоток';
					mysql_close();
					}
					else {?>
							<div class="photo_present">
								<fieldset>
									<legend>11 класс</legend>
									<a href="http://the11a.16mb.com/galery/?class=11&album=Первое сентября">
										<img src="http://cs309922.vk.me/v309922897/1c71/aa6ozn7RVK4.jpg">
									</a>
									<a href="http://the11a.16mb.com/galery/?class=11&album=album.2">
										<img src="/upload/photo/DSC_8429.JPG">
									</a>
									<div class="other_albums">
										<a href="http://the11a.16mb.com/galery/?class=11">Еще альбомы</a>
									</div>
								</fieldset>
								<hr id="g_hr">
								<fieldset>
									<legend>10 класс</legend>
									<a href="http://the11a.16mb.com/galery/?class=10&album=album.1">
										<img src="/upload/photo/P5130877.JPG">
									</a>
									<a href="http://the11a.16mb.com/galery/?class=10&album=album.2">
										<img src="/upload/photo/P5130877.JPG">
									</a>
									<div class="other_albums">
										<a href="http://the11a.16mb.com/galery/?class=10">Еще альбомы</a>
									</div>
								</fieldset>
								<hr id="g_hr">
								<fieldset>
									<legend>9 класс</legend>
									<a href="http://the11a.16mb.com/galery/?class=9&album=album.1">
										<img src="/upload/photo/y_4cb546e1.jpg">
									</a>
									<a href="http://the11a.16mb.com/galery/?class=9&album=album.2">
										<img src="/upload/photo/y_4cb546e1.jpg">
									</a>
									<div class="other_albums">
										<a href="http://the11a.16mb.com/galery/?class=8">Еще альбомы</a>
									</div>
								</fieldset>
								<hr id="g_hr">
								<fieldset>
									<legend>8 класс</legend>
									<a href="http://the11a.16mb.com/galery/?class=8&album=album.1">
										<img src="/upload/photo/_DSC0785.JPG">
									</a>
									<a href="http://the11a.16mb.com/galery/?class=8&album=album.2">
										<img src="/upload/photo/_DSC0785.JPG">
									</a>
									<div class="other_albums">
										<a href="http://the11a.16mb.com/galery/?class=8">Еще альбомы</a>
									</div>
								</fieldset>
							</div>
						<?}?>
			</div>
		</div>
		<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>