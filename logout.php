<?php
session_start();
//echo 'Завершаем.';
foreach($_SESSION as $ind => $param)
unset($_SESSION['$ind']);
$_SESSION['online']=0;
session_destroy();
header('Location: http://the11a.16mb.com/');
?>