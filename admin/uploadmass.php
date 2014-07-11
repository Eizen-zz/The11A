<?php
foreach($_FILES['file']['name'] as $k=>$f) {
  if (!$_FILES['file']['error'][$k]) {
    if (is_uploaded_file($_FILES['file']['tmp_name'][$k])) {
      if (move_uploaded_file($_FILES['file']['tmp_name'][$k], "/home/u440081817/public_html/upload/".$_FILES['file']['name'][$k])) {
        echo 'Ccылка на файл: http://the11a.16mb.com/upload/'.$_FILES['file']['name'][$k].'<br />';
      }
    }
  }
}

echo '<br><a href="http://the11a.16mb.com/">Вернуться</a>';
//header('Location: http://the11a.16mb.com/admin/addfile.php');
?>