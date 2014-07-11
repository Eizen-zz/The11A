<?php
include('connection.php');
foreach($_FILES['file']['name'] as $k=>$f) {
  if (!$_FILES['file']['error'][$k]) {
    if (is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
      if (move_uploaded_file($_FILES['file']['tmp_name'][$k], "/home/u440081817/public_html/upload/photo/".$_FILES['file']['name'][$k])) {
    		$src = '/upload/photo/'.$_FILES['file']['name'][$k];
    		$album = $_POST['title'];
    		$query = mysql_query("INSERT INTO `photos` (`src`, `album`) VALUES ('$src', '$album')");
    		echo 'Файл: '.$_FILES['file']['name'][$k].' загружен.<br />';
      }
    }
  }
}

echo '<br><a href="http://the11a.16mb.com/admin/">Вернуться</a>';
//header('Location: http://the11a.16mb.com/admin/addfile.php');
?>