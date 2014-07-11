<? session_start();
if ($_SESSION['status'] != 2 && $_SESSION['status'] != 1)
	exit('<p style="background:#000; color: #FFF;" align="center">Здесь разводят редкий вид <b>бобров</b>. Ваше пристутствие может спугнуть их, поэтому предлагаем вам пройти по ссылке, указанной ниже.</p><p align="center"><a href="http://the11a.16mb.com/">Вот сюда.</a></p>'); 
?>
<!DOCTYPE HTML>
<html>
	<head>
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<meta charset="utf-8">
		<? include($_SERVER['DOCUMENT_ROOT'] . '/style.php'); ?>
		<title>Добавление учебного материала</title>
	<head>

	<body>

		<div id="container">
		<div id="header"></div>
		<?
			$std = date("G");
			if ($std >= 3 && $std < 18) // время с 6.00 до 20.59
				include('table.php');
			else 
				include('tablen.php');
		?>
		</div>
		
		<div id="content">
		<div id="sidebar">
			Добавление материала
			<? include($_SERVER['DOCUMENT_ROOT'] . '/sidebar.php'); ?>
		</div>
		<div id="main">
		<fieldset>
			<legend>Добавить материал</legend>
			<form action="?act=add" method="post" enctype="multipart/form-data"> 
				<p>Предмет:</p><select name="subj" size=1>
				<option value=1 selected>Русский язык</option>
				<option value=2>Математика</option>
				<option value=3>Информатика</option>
				<option value=4>Физика</option>
				</select>
				<p>Тема:</p><input type="text" name="title" size="50">
				<p>Описание:</p><textarea name="text" cols="50" rows="10"></textarea>
				<p>Если прикрепляемый материал вы заимствуете с другого ресурса, то укажите ссылку на материал в поле "Ссылка на материал" и нажмите "Добавить".</p>
				<p>Ссылка на материал:</p><input type="text" name="afile" size="50"></p>
				<p>Если прикрепляемый материал вы хотите загрузить со своего компьютера, то выберите загружаемый файл и нажмите "Добавить".</p>
				<p>Прикрепить файл: <input type="file" name="filename"></p>
				<p><input type="submit" name="add" value="Добавить"></p>
			</form>
		</fieldset>
		<?
			$act = $_GET['act'];
			if ($act == 'add' && isset($_POST['add'])) {
				$subj = $_POST['subj'];
				$title = $_POST['title'];
				$text = nl2br($_POST['text']);
				$suggest = 0;
				if (!empty($_POST['afile']))
					$afile = $_POST['afile'];
				elseif (!empty($_FILES['filename'])) {
					if($_FILES["filename"]["size"] > 1024*1024*10) {
						echo ("Размер файла превышает десять мегабайт!");
						exit;
					}
					if(is_uploaded_file($_FILES["filename"]["tmp_name"]))
						move_uploaded_file($_FILES["filename"]["tmp_name"], "/home/u440081817/public_html/upload/".$_FILES["filename"]["name"]);
					else
						echo("Ошибка загрузки файла");
					$afile = "http://the11a.16mb.com/upload/".$_FILES["filename"]["name"];
				}
				include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
				$query = mysql_query("INSERT INTO `study` (`subject`, `title`, `text`, `afile`, `suggest`) VALUES ('$subj', '$title', '$text', '$afile', '$suggest')");
				mysql_close();
				echo '<script>window.location = "/study/"</script>';
			}
			
			if ($act == 'delete' && isset($_POST['del'])) {
				$id = $_POST['id'];
				include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
				$query = mysql_query("DELETE FROM `study` WHERE `id`='$id'");
				mysql_close();
				echo '<script>window.location = "/study/"</script>';
			}
		?>
		</div>
		</div>
	</body>
</html>