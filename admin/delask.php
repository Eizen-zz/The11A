<?php
session_start();

$id = $_POST['id'];

include('connection.php');

if (isset($_POST['del']))
$query = mysql_query("DELETE FROM `support` WHERE `id`='$id'");

mysql_close();
header('Location: http://the11a.16mb.com/admin/support.php');
?>