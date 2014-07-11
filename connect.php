<?
	$host='';
	$user='';
	$pass='';
	$db='';
	$connect = mysql_connect($host, $user, $pass);
	if (!$connect || !mysql_select_db($db, $connect))
		exit(mysql_error());
	mysql_set_charset('utf8', $connect);