<?php
$host='mysql.hostinger.ru';
$user='u440081817_user';
$pass='AAZ693RVS';
$db='u440081817_school';

$connect = mysql_connect($host, $user, $pass);

if (!$connect || !mysql_select_db($db, $connect))
{
	exit(mysql_error());
}
mysql_set_charset('utf8', $connect);
?>