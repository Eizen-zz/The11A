<?php
session_start();

$task = $_POST['task'];
$les = $_POST['les'];

include('connection.php');

if (isset($_POST['add']))
$query = mysql_query("UPDATE `hometask` SET `$les`='$task'");

mysql_close();

$_SESSION['htask_action']=1;
header('Location: http://the11a.16mb.com/hometask/');
?>