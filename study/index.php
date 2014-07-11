<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta property="og:image" content="/img/thumbnail.png">
		<meta property="og:title" content="Учебный материал сайта The11A">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta name="description" content="Учебный материал сайта The11A">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<script src="/js/main.js"></script>
		<title>Учебный материал</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/table.php'); ?>
		</div>  
  
		<div id="content">
			<div id="sidebar">
				<b>Учебный материал</b><br>
					<?
					if ($_SESSION['online'] == 1)
						echo '<a href="http://the11a.16mb.com/suggest.php">[Предложить материал]</a><br>';
					if ($_SESSION['status'] == 2)
						{
							echo '<a href="/admin/addstudy.php">[Добавить материал]</a>';
							include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
							$query = mysql_query("SELECT COUNT(*) FROM `study` WHERE `suggest`='1'");
							$row = mysql_fetch_row($query);
							printf("<br>Предложено материала: <a href=\"http://the11a.16mb.com/suggest.php?act=publish\" target=\"_blank\"><b>%d</b></a>", $row[0]);
							mysql_close();
						}
					?>
				<hr class="sb_hr">
				<? include('subjects.php'); ?>
				<hr class="sb_hr">
				<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
			</div>
			<div id="main">
				<?
				$subj = $_GET['subj'];
				switch ($subj)
				{
					case 'rus':
					$i = 1;
					break;
					
					case 'math':
					$i = 2;
					break;
					
					case 'inf':
					$i = 3;
					break;
					
					case 'phys':
					$i = 4;
					break;
				}

				if ($i == 1 || $i == 2 || $i == 3 || $i == 4)
					{
						include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
						$result = mysql_query("SELECT * FROM `study` WHERE `subject`='$i' AND `suggest`='0' ORDER BY `id` DESC");
						while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								//printf("<a href=\"http://the11a.16mb.com/study/material.php?id=%d\" target=\"_blank\"><span class=\"study_title\">%s</span></a><br>", $row['id'], $row['title']);
								printf("<a class=\"study_title\" id=\"tool_a\" onclick=\"showTooltip('tooltip_%d');\">%s</a><br>", $row['id'], $row['title']);
								printf("<div id=\"tooltip_%d\" style=\"display: none;\">", $row['id']);
									printf("<span class=\"study\">%s</span><br>", $row['text']);
									if (!empty($row['afile']))
										printf("<i><a href=\"%s\">Материал</a></i><br>", $row['afile']);
								echo '</div>';
								if ($_SESSION['status']==2 || $_SESSION['status']==1)
									{
										echo '<form action="http://the11a.16mb.com/admin/chngstudy.php" method="post">';
										printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
										echo '<input type="submit" name="chng" value="Изменить">';
										echo '</form>';
										echo '<form action="http://the11a.16mb.com/admin/addstudy.php?act=delete" method="post">';
										printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
										echo '<input type="submit" name="del" value="Удалить">';
										echo '</form>';
									}
								echo '<hr class="news_hr">';
							}
						mysql_close();
					}
				else
					{
						echo '<a href="?subj=rus"><img src="/img/rus.jpg" class="rus" /></a>';
						echo '<a href="?subj=math"><img src="/img/math.jpg" class="math" /></a><br>';
						echo '<a href="?subj=inf"><img src="/img/inf.jpg" class="inf" /></a>';
						echo '<a href="?subj=phys"><img src="/img/phys.jpg" class="phys" /></a>';
					}

				?>
			</div>
			<? include($_SERVER['DOCUMENT_ROOT'] . '/footer.php'); ?>
		</div>
	</body>
</html>
