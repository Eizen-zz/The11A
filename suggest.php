<? session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<? include('style.php'); ?>
		<title>Предложить учебный материал</title>
	</head>

	<body>
		<div id="container">
			<div id="header"></div>
			<? include('table.php'); ?>
		</div>
     
		<div id="content">
			<div id="sidebar">
				<b>Предложить материал</b>
			</div>
			<div id="main">
			<?
			$act = $_GET['act'];
			if ($act == 'suggest' && isset($_POST)) {
				$subj = $_POST['subj'];
				$title = $_POST['title'];
				$text = $_POST['text'];
				$suggest = 1;
				if (!empty($_POST['afile']))
					$afile = $_POST['afile'];
				elseif (!empty($_FILES['filename'])) {
					if($_FILES["filename"]["size"] > 1024*1024*5) {
						echo ("Размер файла превышает пять мегабайт!");
						exit;
					}
					if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
						move_uploaded_file($_FILES["filename"]["tmp_name"], "/home/u440081817/public_html/upload/suggest/".$_FILES["filename"]["name"]);
					else
						echo("Ошибка загрузки файла");
				$afile = "http://the11a.16mb.com/upload/suggest/".$_FILES["filename"]["name"];
				}
				include('connect.php');
				$query = mysql_query("INSERT INTO `study` (`subject`, `title`, `text`, `afile`, `suggest`) VALUES ('$subj', '$title', '$text', '$afile', '$suggest')");
				mysql_close();
				echo '<script>window.location = "/study/"</script>';
			}
			elseif ($act == 'publish' && $_SESSION['status'] == 2) {
				include('connect.php');
				$query = mysql_query("SELECT * FROM `study` WHERE `suggest`='1'");
				while ($row = mysql_fetch_array($query, MYSQL_ASSOC)) {
					switch ($row['subject']) {
						case 1:
						$row['subject'] = 'Русский язык';
						break;
									
						case 2:
						$row['subject'] = 'Математика';
						break;
									
						case 3:
						$row['subject'] = 'Информатика';
						break;
									
						case 4:
						$row['subject'] = 'Физика';
						break;
					}
					printf("<b>Предмет</b>: %s<br>", $row['subject']);
					printf("<b>Тема</b>: %s<br>", $row['title']);
					printf("<b>Описание</b>: %s<br>", $row['text']);
					printf("<b>Ссылка на материал</b>: %s<br>", $row['afile']);
					echo '<form action="?act=published" method="post">';
					printf("<input type=\"hidden\" name=\"id\" value=\"%d\">", $row['id']);
					echo '<input type="submit" name="publish" value="Опубликовать">';
					echo '</form><hr>';
				}
				mysql_close();
			}	
			elseif ($act == 'published' && !empty($_POST['publish'])) {
				$id = $_POST['id'];
				$suggest = 0;
				include('connect.php');
				$query = mysql_query("UPDATE `study` SET `suggest`='$suggest' WHERE `id`='$id'");
				mysql_close();
			}
			else {
				?>
					<form action="?act=suggest" method="post" enctype="multipart/form-data"> 
						<fieldset>
							<legend>Предложить материал</legend>
							<p>Предмет:</p>
							<select name="subj" size=1>
								<option value=1 selected>Русский язык</option>
								<option value=2>Математика</option>
								<option value=3>Информатика</option>
								<option value=4>Физика</option>
							</select>
							<p>Тема:</p>
							<input type="text" name="title" size="50">
							<p>Описание:</p>
							<textarea name="text" cols="50" rows="10"></textarea>
							<p>Если прикрепляемый материал вы заимствуете с другого ресурса, то укажите ссылку на материал в поле "Ссылка на материал" и нажмите "Предложить".</p>
							<p>Ссылка на материал:</p><input type="text" name="afile" size="50"></p>
							<p>Если прикрепляемый материал вы хотите загрузить со своего компьютера, то выберите загружаемый файл и нажмите "Предложить".</p>
							<p>Прикрепить файл: <input type="file" name="filename"></p>
							<p><button type="submit">Предложить</button></p>
						</fieldset>
					</form>
				<?}?>
			</div>
		</div>
	</body>
</html>