<?php
session_start();

$stat=1;
$answer=$_POST['answer'];
$id=$_POST['id'];
//settype($id, "integer");

include('connection.php');

if (isset($_POST['ans']))
$query = mysql_query("UPDATE `support` SET `status`='$stat', `answer`='$answer' WHERE `id`='$id'");

//echo '<p style="background:#CA181A; color: #FFF;" align="center">';
//echo 'Вы ответили на еще один вопрос, ура! <a href="support.php" style="color:#FFF">Вернуться</a>. </p>';
mysql_close();
header('Location: http://the11a.16mb.com/admin/support.php');
?>